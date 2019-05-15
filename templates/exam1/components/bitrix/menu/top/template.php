<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="nav">
	<div class="inner-wrap">
		<div class="menu-block popup-wrap">
			<a href="" class="btn-menu btn-toggle"></a>
			<div class="menu popup-block">
				<ul class="">
<?//echo '<pre>'; var_dump($arResult); echo '</pre>';?>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"] && $arItem["PERMISSION"] > "D"):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
				<?
				if($arItem['PARAMS']['DESCRIPTION']){
					echo '<div class="menu-text">';
					echo $arItem['PARAMS']['DESCRIPTION'] . ' "' . $arItem["TEXT"] .  '"';
					echo '</div>';
				}
				?>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
				<?
				if($arItem['PARAMS']['DESCRIPTION']){
					echo '<div class="menu-text">';
					echo $arItem['PARAMS']['DESCRIPTION'] . ' "' . $arItem["TEXT"] .  '"';
					echo '</div>';
				}
				?>					
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if($arItem['PARAMS']['class']){echo $arItem['PARAMS']['class'];}?>">
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

				</ul>
				<a href="" class="btn-close"></a>
			</div>
			<div class="menu-overlay"></div>
		</div>
	</div>
</nav>				

<?endif?>