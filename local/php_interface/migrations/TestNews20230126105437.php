<?php

namespace Sprint\Migration;


class TestNews20230126105437 extends Version
{

    protected $description = "";

    public function up() {
        $helper = $this->getHelperManager();

            $helper->Iblock()->saveIblockType(array (
  'ID' => 'news',
  'SECTIONS' => 'Y',
  'EDIT_FILE_BEFORE' => NULL,
  'EDIT_FILE_AFTER' => NULL,
  'IN_RSS' => 'N',
  'SORT' => '10',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Новости',
      'SECTION_NAME' => 'Группы',
      'ELEMENT_NAME' => 'Новость',
    ),
  ),
));
    
            $iblockId = $helper->Iblock()->saveIblock(array (
  'IBLOCK_TYPE_ID' => 'news',
  'LID' => 
  array (
    0 => 's1',
  ),
  'CODE' => 'shop_news',
  'API_CODE' => NULL,
  'REST_ON' => 'N',
  'NAME' => 'Новости магазина',
  'ACTIVE' => 'Y',
  'SORT' => '100',
  'LIST_PAGE_URL' => '/content/news/',
  'DETAIL_PAGE_URL' => '/content/news/#SECTION_ID#/#ELEMENT_ID#/',
  'SECTION_PAGE_URL' => '/content/news/#SECTION_ID#/',
  'CANONICAL_PAGE_URL' => NULL,
  'PICTURE' => NULL,
  'DESCRIPTION' => 'Новости интернет-магазина',
  'DESCRIPTION_TYPE' => 'html',
  'RSS_TTL' => '24',
  'RSS_ACTIVE' => 'Y',
  'RSS_FILE_ACTIVE' => 'N',
  'RSS_FILE_LIMIT' => NULL,
  'RSS_FILE_DAYS' => NULL,
  'RSS_YANDEX_ACTIVE' => 'N',
  'XML_ID' => 'content-news',
  'INDEX_ELEMENT' => 'Y',
  'INDEX_SECTION' => 'Y',
  'WORKFLOW' => 'Y',
  'BIZPROC' => 'N',
  'SECTION_CHOOSER' => 'L',
  'LIST_MODE' => NULL,
  'RIGHTS_MODE' => 'S',
  'SECTION_PROPERTY' => NULL,
  'PROPERTY_INDEX' => NULL,
  'VERSION' => '1',
  'LAST_CONV_ELEMENT' => '0',
  'SOCNET_GROUP_ID' => NULL,
  'EDIT_FILE_BEFORE' => NULL,
  'EDIT_FILE_AFTER' => NULL,
  'SECTIONS_NAME' => 'Разделы новостей',
  'SECTION_NAME' => 'Раздел новостей',
  'ELEMENTS_NAME' => 'Новости',
  'ELEMENT_NAME' => 'Новость',
  'EXTERNAL_ID' => 'content-news',
  'LANG_DIR' => '/',
  'SERVER_NAME' => NULL,
));
    
            $helper->Iblock()->saveIblockFields($iblockId, array (
  'IBLOCK_SECTION' => 
  array (
    'NAME' => 'Привязка к разделам',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'KEEP_IBLOCK_SECTION_ID' => 'N',
    ),
  ),
  'ACTIVE' => 
  array (
    'NAME' => 'Активность',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'ACTIVE_FROM' => 
  array (
    'NAME' => 'Начало активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '=now',
  ),
  'ACTIVE_TO' => 
  array (
    'NAME' => 'Окончание активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SORT' => 
  array (
    'NAME' => 'Сортировка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '0',
  ),
  'NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'PREVIEW_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'Y',
      'SCALE' => 'Y',
      'WIDTH' => 200,
      'HEIGHT' => 200,
      'IGNORE_ERRORS' => 'N',
      'METHOD' => '',
      'COMPRESSION' => '',
      'DELETE_WITH_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'PREVIEW_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип описания для анонса',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'PREVIEW_TEXT' => 
  array (
    'NAME' => 'Описание для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'Y',
      'WIDTH' => 400,
      'HEIGHT' => 400,
      'IGNORE_ERRORS' => 'N',
      'METHOD' => '',
      'COMPRESSION' => '',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'DETAIL_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип детального описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'DETAIL_TEXT' => 
  array (
    'NAME' => 'Детальное описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'UNIQUE' => 'N',
      'TRANSLITERATION' => 'N',
      'TRANS_LEN' => 100,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
  ),
  'TAGS' => 
  array (
    'NAME' => 'Теги',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'DELETE_WITH_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'SECTION_DESCRIPTION_TYPE' => 
  array (
    'NAME' => 'Тип описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_DESCRIPTION' => 
  array (
    'NAME' => 'Описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => NULL,
      'WATERMARK_TEXT_FONT' => NULL,
      'WATERMARK_TEXT_COLOR' => NULL,
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => NULL,
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => NULL,
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => NULL,
      'WATERMARK_FILE_ORDER' => NULL,
    ),
  ),
  'SECTION_XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
  ),
  'SECTION_CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'UNIQUE' => 'N',
      'TRANSLITERATION' => 'N',
      'TRANS_LEN' => 100,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
  ),
));
    
                $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Описание',
  'ACTIVE' => 'Y',
  'SORT' => '100',
  'CODE' => 'DESCRIPTION',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => 'content-news-property-description',
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => NULL,
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => NULL,
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => NULL,
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Источник',
  'ACTIVE' => 'Y',
  'SORT' => '200',
  'CODE' => 'SOURCE',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => 'content-news-property-source',
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => NULL,
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => NULL,
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => NULL,
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ключевые слова',
  'ACTIVE' => 'Y',
  'SORT' => '300',
  'CODE' => 'KEYWORDS',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => 'content-news-property-keywords',
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => NULL,
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => NULL,
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => NULL,
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Темы',
  'ACTIVE' => 'Y',
  'SORT' => '400',
  'CODE' => 'THEMES',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'G',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => 'content-news-property-themes',
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'services:themes',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'Y',
  'IS_REQUIRED' => NULL,
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => NULL,
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок окна браузера',
  'ACTIVE' => 'Y',
  'SORT' => '1000',
  'CODE' => 'BROWSER_TITLE',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => 'content-news-property-browser_title',
  'FILE_TYPE' => NULL,
  'MULTIPLE_CNT' => '1',
  'LINK_IBLOCK_ID' => NULL,
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'Y',
  'FILTRABLE' => 'Y',
  'IS_REQUIRED' => NULL,
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => NULL,
));
        
            $helper->UserOptions()->saveElementForm($iblockId, array (
  'Новость' => 
  array (
    'ACTIVE' => 'Новость активна',
    'ACTIVE_FROM' => 'Дата новости',
    'SECTIONS' => 'Новостные разделы',
    'NAME' => 'Заголовок',
    'PREVIEW_TEXT' => 'Описание для анонса',
    'DETAIL_TEXT' => 'Детальное описание',
    'DETAIL_PICTURE' => 'Детальная картинка',
    'TAGS' => 'Теги',
    'PROPERTY_THEMES' => 'Темы',
    'PROPERTY_SOURCE' => 'Источник',
    'edit1_csection1' => 'Поисковая оптимизация',
    'PROPERTY_KEYWORDS' => 'Ключевые слова',
    'PROPERTY_DESCRIPTION' => 'Описание',
    'PROPERTY_BROWSER_TITLE' => 'Заголовок окна браузера',
    'edit1_csection2' => 'Документооборот',
    'WF_STATUS_ID' => 'Статус',
  ),
));
    
    
    
        }

    public function down()
    {
        $helper = $this->getHelperManager();

        //your code ...
    }

}
