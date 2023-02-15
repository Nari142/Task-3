<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "bitrix/modules/main/include/prolog_before.php"); //Включение и проверка файла на повторное включение
if (!$USER->IsAdmin()) {
    LocalRedirect('bitrix/bitrix.php'); //Выполняет перенаправление браузера на указанную страницу
}

\bitrix\Main\Loader::includeModule('iblock'); // Проверка на существование и запуск "Информационные блоки"
$row = 1; // Кол-во рядов
$IBLOCK_ID = 42; // Кол-во блоков

$el = new CIBlockElement; // Создаётся новый класс для работы с элементами инфоблоков
$arProps = [];

$rsElement = CIBlockElement::getList([], ['IBLOCK_ID' => 1],
    false, false, ['ID', 'NAME']);// Возвращает список объектов, без сортировки, филтр инфблок => 37, группировка и навигация не включенны, выбрать по ID и NAME

while ($ob = $rsElement->GetNextElement()) { //Начало перебора элементов 
    $arFields = $ob->GetFields(); // Возвращает массив значений полей приведенный в HTML безопасный вид.
    $key = str_replace(['»', '«', '(', ')'], '', $arFields['NAME']); //Заменяет все вхождения строки поиска на строку замены
    $key = strtolower($key); //Преобразует строку в нижний регистр
    $arKey = explode(' ', $key); //  Разбивает строку с помощью разделителя
    $key = ''; // Сброс ключа
    foreach ($arKey as $part) {
        if (strlen($part) > 2) {
            $key .= trim($part) . ' '; // Удаляет пробелы из начала и конца строки
        }
    }
    $key = trim($key);
    $arProps['OFFICE'][$key] = $arFields['ID']; // Присваивается ID
}

$rsProp = CIBlockPropertyEnum::GetList( // класс для работы со вариантами значений свойств типа "список". 	Возвращает список вариантов свойств по фильтру.
    ["SORT" => "ASC", "VALUE" => "ASC"],
    ['IBLOCK_ID' => $IBLOCK_ID]
);
while ($arProp = $rsProp->Fetch()) {
    $key = trim($arProp['VALUE']);
    $arProps[$arProp['PROPERTY_CODE']][$key] = $arProp['ID'];
}

$rsElements = CIBlockElement::GetList([], ['IBLOCK_ID' => $IBLOCK_ID], false, false, ['ID']); // Возвращает список объектов
while ($element = $rsElements->GetNext()) {
    CIBlockElement::Delete($element['ID']); // Удаление объекта по ID
}

if (($handle = fopen("vacancy.csv", "r")) !== false) { // Открывает файл
    while (($data = fgetcsv($handle, 1000, ",")) !== false) { // Читает строку из файла и производит разбор данных CSV
        if ($row == 1) {
            $row++;
            continue;
        }
        $row++;

        $PROP['ACTIVITY'] = $data[9];
        $PROP['FIELD'] = $data[11];
        $PROP['OFFICE'] = $data[1];
        $PROP['LOCATION'] = $data[2];
        $PROP['REQUIRE'] = $data[4];
        $PROP['DUTY'] = $data[5];
        $PROP['CONDITIONS'] = $data[6];
        $PROP['EMAIL'] = $data[12];
        $PROP['DATE'] = date('d.m.Y');
        $PROP['TYPE'] = $data[8];
        $PROP['SALARY_TYPE'] = '';
        $PROP['SALARY_VALUE'] = $data[7];
        $PROP['SCHEDULE'] = $data[10];

        foreach ($PROP as $key => &$value) {
            
            $value = trim($value);
            $value = str_replace('\n', '', $value);
            if (stripos($value, '•') !== false) {
                $value = explode('•', $value); //Разделить строку на строку
                array_splice($value, 0, 1); //Удалите часть массива и замените его чем-то другим
                foreach ($value as &$str) {
                    $str = trim($str);
                } 
            } elseif ($arProps[$key]) {
                $arSimilar = [];
                foreach ($arProp[$key] as $propKey => $propVal) {
                    if ($key == 'LOCATION') {
                        $value = strtolower($value);
                        if ($value == 'Тюмень') {
                            $value .= 'Главный офис' . $data[1];
                        }elseif ($value == 'Санкт-Петербург' ) {
                            $value .= 'Дополнительный офис' . $data[1];
                        }
                        $arSimilar[similar_text($value, $propKey)] = $propVal;
                    }
                    if (stripos($propKey, $value) !== false) { //Возвращает позицию первого вхождения подстроки без учёта регистра
                        $value = $propVal;
                        break;
                    }

                    if (similar_text($propKey, $value) > 50) { //Вычисляет степень похожести двух строк
                        $value = $propVal;
                    }
                }
                
            }
        }

        if ($PROP['FIELD'] == 'Сменный график') {
            $PROP['ACTIVITY'] = 'Рабочие';
        }elseif ($PROP['FIELD'] == 'Полный день') {
            $PROP['ACTIVITY'] = 'РСС';
        }

        $arLoadProductArray = [
            "MODIFIED_BY" => $USER->GetID(),
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $IBLOCK_ID,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $data[3],
            "ACTIVE" => end($data) ? 'Y' : 'N',
        ];

        if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            echo "Добавлен элемент с ID : " . $PRODUCT_ID . "<br>";
        } else {
            echo "Error: " . $el->LAST_ERROR . '<br>';
        }
    }
    fclose($handle);//Закрывает открытый дескриптор файла
}