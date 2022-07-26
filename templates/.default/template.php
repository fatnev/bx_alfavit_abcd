<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(method_exists($this, 'setFrameMode')) $this->setFrameMode(true);?>
<?
if(!$_REQUEST["letter"] && $_REQUEST["letter"] !== '0' && $arParams["SHOW_ALL"])
	$_REQUEST["letter"]="all";
	
$arDelParams = array("letter", 'PAGEN_1');
if(isset($arParams["SEF"]) && $arParams["SEF"] == 'Y')
{
	$arDelParams = array_merge($arDelParams, array('SECTION_CODE', 'order', 'by', 'view', 'page_count', 'PAGEN_1'));
	if(!empty($arParams["FOLDER_SEF"]))
		$curDir = $arParams["FOLDER_SEF"];
	else
		$curDir = $APPLICATION->GetCurDir();

	$curDir = preg_replace( '#page-\d+\/#', '', $curDir);
	$curDir = preg_replace( '#letter-\w{1,3}\/#', '', $curDir);
}
?>

<nav aria-label="Alfabet navigation">
<ul class="pagination pagination-sm justify-content-center flex-wrap">

<?if(isset($arParams["SEF"]) && $arParams["SEF"] == 'Y'):?>
	<?if($arParams["SHOW_NUMBER"] && $arParams["GROUP_NUMBER"] && $arParams["GROUP_NUMBER_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="number"):?><a data-abcd="number" class="page-link p-1" href='<?=$curDir?>letter-number/' rel="nofollow"><?endif;?><?=GetMessage('number_group');?><?if($_REQUEST["letter"]!="number"):?></a><?endif;?></li>
	<?endif;?>
	<?if($arParams["SHOW_ENG"] && $arParams["GROUP_ENG"] && $arParams["GROUP_ENG_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="eng"):?><a data-abcd="eng" class="page-link p-1" href='<?=$curDir?>letter-eng/' rel="nofollow"><?endif;?><?=GetMessage('english_group');?><?if($_REQUEST["letter"]!="eng"):?></a><?endif;?></li>
	<?endif;?>
	<?if($arParams["SHOW_RUS"] && $arParams["GROUP_RUS"] && $arParams["GROUP_RUS_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="rus"):?><a data-abcd="rus" class="page-link p-1" href='<?=$curDir?>letter-rus/' rel="nofollow"><?endif;?><?=GetMessage('russian_group');?><?if($_REQUEST["letter"]!="rus"):?></a><?endif;?></li>
	<?endif;?>
	<?foreach($arResult['letters'] as $key=>$value):?>
	<li class="page-item"><?if(strtoupper($_REQUEST["letter"])!=$value):?><a class="page-link p-1" data-abcd="<?=$value?>" href='<?=$curDir?>letter-<?=$value?>/' rel="nofollow"><?endif;?><?=$value?><?if(strtoupper($_REQUEST["letter"])!=$value):?></a><?endif;?></li>
	<?endforeach;?>
	<?if($arParams["SHOW_ALL"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="all"):?><a class="page-link" data-abcd="all" href='<?=$curDir?>letter-all/' rel="nofollow"><?endif;?><span class="page-link"><?=GetMessage('all');?></span><?if($_REQUEST["letter"]!="all"):?></a><?endif;?></li>
	<?endif;?>
<?else:?>
	<?if($arParams["SHOW_NUMBER"] && $arParams["GROUP_NUMBER"] && $arParams["GROUP_NUMBER_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="number"):?><a class="page-link p-1" data-abcd="number" href='<?=$APPLICATION->GetCurPageParam("letter=number", $arDelParams);?>' rel="nofollow"><?endif;?><?=GetMessage('number_group');?><?if($_REQUEST["letter"]!="number"):?></a><?endif;?></li>
	<?endif;?>
	<?if($arParams["SHOW_ENG"] && $arParams["GROUP_ENG"] && $arParams["GROUP_ENG_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="eng"):?><a class="page-link p-1" data-abcd="eng" href='<?=$APPLICATION->GetCurPageParam("letter=eng", $arDelParams);?>' rel="nofollow"><?endif;?><?=GetMessage('english_group');?><?if($_REQUEST["letter"]!="eng"):?></a><?endif;?></li>
	<?endif;?>
	<?if($arParams["SHOW_RUS"] && $arParams["GROUP_RUS"] && $arParams["GROUP_RUS_FLAG"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="rus"):?><a class="page-link p-1" data-abcd="rus" href='<?=$APPLICATION->GetCurPageParam("letter=rus", $arDelParams);?>' rel="nofollow"><?endif;?><?=GetMessage('russian_group');?><?if($_REQUEST["letter"]!="rus"):?></a><?endif;?></li>
	<?endif;?>
	<?foreach($arResult['letters'] as $key=>$value):?>
	<li class="page-item"><?if(strtoupper($_REQUEST["letter"])!=$value):?><a class="page-link p-1" data-abcd="<?=$value?>" href='<?=$APPLICATION->GetCurPageParam("letter=".$value, $arDelParams);?>' rel="nofollow"><?endif;?><?=$value?><?if(strtoupper($_REQUEST["letter"])!=$value):?></a><?endif;?></li>
	<?endforeach;?>
	<?if($arParams["SHOW_ALL"]):?>
	<li class="page-item"><?if($_REQUEST["letter"]!="all"):?><a class="page-link p-1" data-abcd="all" href='<?=$APPLICATION->GetCurPageParam("letter=all", $arDelParams);?>' rel="nofollow"><?endif;?><span class="page-link"><?=GetMessage('all');?></span><?if($_REQUEST["letter"]!="all"):?></a><?endif;?></li>
	<?endif;?>
<?endif;?>

</ul>
</nav>