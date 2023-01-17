<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if(!empty($arResult["ITEMS"])):?>
	<body>
	<div id="barba-wrapper">
			<?php foreach($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="article-list" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
				<?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
        			<div class="article-item__background"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                   data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx"
                                                   alt=""/></div>
				<?php endif; ?>
					<div class="article-item__wrapper">
						<div class="article-item__title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?= isset($arItem['NAME'])? $arItem['NAME'] : '' ; ?></a></div>
						<div class="article-item__content"><?= isset($arItem['PREVIEW_TEXT'])? $arItem['PREVIEW_TEXT'] : '' ; ?></div>
					</div>
				</div>
			<?php endforeach; ?>	
	</div>
	</body>
<?php endif; ?>