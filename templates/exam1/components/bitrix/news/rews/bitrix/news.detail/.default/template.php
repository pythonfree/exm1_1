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

<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
		<div class="review-autor">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<?=$arResult["NAME"]?>,
			<?endif;?>
			
			<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?=$arResult["DISPLAY_ACTIVE_FROM"]?> г.,
			<?endif;?>
			
			<?$strProps = [];?>
			<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
				<?if($pid == 'DOCUMENTS'){continue;}?>
				<?$strProps[] = $arProperty["DISPLAY_VALUE"];?>
			<?endforeach;?>
			<?=implode(",&nbsp;", $strProps);?>
			
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
		<?else:?>
			<img src="<?=SITE_TEMPLATE_PATH;?>/img/rew/no_photo.jpg" alt="<?=$arItem["NAME"]?>">
		<?endif;?>
	</div>
</div>

<div class="exam-review-doc">
	
	<?if(is_array($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['FILE_VALUE'])):?>
		<p>Документы:</p>
		<?if(!isset($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['FILE_VALUE']['ID'])):?>
			<?foreach($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['FILE_VALUE'] as $key=>$value):?>
				<div  class="exam-review-item-doc">
					<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png">
					<a href="<?=$value['SRC'];?>"><?=$value['ORIGINAL_NAME'];?></a>	
				</div>
			<?endforeach;?>
		<?else:?>
			<div  class="exam-review-item-doc">
				<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png">
				<a href="<?=$arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['FILE_VALUE']['SRC'];?>">
					<?=$arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['FILE_VALUE']['ORIGINAL_NAME'];?>
				</a>	
			</div>		
		<?endif;?>
	<?endif;?>
	
</div>

<hr>


