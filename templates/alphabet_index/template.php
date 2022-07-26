<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(method_exists($this, 'setFrameMode')) $this->setFrameMode(true);
if(!$_REQUEST["letter"] && $_REQUEST["letter"] !== '0' && $arParams["SHOW_ALL"])
	$_REQUEST["letter"]="all";
global $MESS;
?>
<div class="alphabetdiv">
    <?if($arParams["SHOW_ENG"]):?>
        <ul class="alphabet">   
        
            <?if($arParams["GROUP_ENG"] && $arParams["GROUP_ENG_FLAG"]):?>
                <li>
                    <?if($_REQUEST["letter"] != "eng"):?>
                        <a href='<?=$APPLICATION->GetCurPageParam("letter=eng", array("letter"));?>' rel="nofollow">
                            <?=GetMessage('english_group');?>
                        </a>
                    <?else:?>
                        <b><?=GetMessage('english_group');?></b>
                    <?endif;?>
                </li>
            <?else:?>
                <?foreach(GetMessage('english_chars') as $e_ch):?>
                    <li>
                        <?if(in_array($e_ch, $arResult['letters']) && !empty($arResult['list'][$e_ch])):?>
                            <span class="alph_active"><?=$e_ch;?></span>
                            <ul>
                                <?foreach($arResult['list'][$e_ch] as $arItem):?>
                                    <li><a href="<?=$arItem['DETAIL_PAGE_URL'];?>" rel="nofollow"><?=$arItem['NAME'];?></a></li>
                                <?endforeach;?>
                            </ul>
                        <?else:?>
                            <span><?=$e_ch;?></span>
                        <?endif;?>
                    </li>
                <?endforeach;?>
            <?endif;?>
        </ul>
    <?endif;?>
    
    <?if($arParams["SHOW_RUS"]):?>
        <ul class="alphabet">  
            <?if($arParams["GROUP_RUS"] && $arParams["GROUP_RUS_FLAG"]):?>
                <li>
                    <?if($_REQUEST["letter"] != "rus"):?>
                        <a href='<?=$APPLICATION->GetCurPageParam("letter=rus", array("letter"));?>' rel="nofollow">
                            <?=GetMessage('russian_group');?>
                        </a>
                    <?else:?>
                        <b><?=GetMessage('russian_group');?></b>
                    <?endif;?>
                </li>
            <?else:?>
                <?foreach(GetMessage('russian_chars') as $r_ch):?>
                    <li>
                        <?if(in_array($r_ch, $arResult['letters']) && !empty($arResult['list'][$r_ch])):?>
                            <span class="alph_active"><?=$r_ch;?></span>
                            <ul>
                                <?foreach($arResult['list'][$r_ch] as $arItem):?>
                                    <li><a href="<?=$arItem['DETAIL_PAGE_URL'];?>" rel="nofollow"><?=$arItem['NAME'];?></a></li>
                                <?endforeach;?>
                            </ul>
                        <?else:?>
                            <span><?=$r_ch;?></span>
                        <?endif;?>
                    </li>
                <?endforeach;?>
            <?endif;?>
        </ul>
    <?endif;?>
    
    <?if($arParams["SHOW_NUMBER"]):?>
        <ul class="alphabet">   
            <?if($arParams["GROUP_NUMBER"] && $arParams["GROUP_NUMBER_FLAG"]):?>
                <li>
                    <?if($_REQUEST["letter"] != "number"):?>
                        <a href='<?=$APPLICATION->GetCurPageParam("letter=eng", array("letter"));?>' rel="nofollow">
                            <?=GetMessage('number_group');?>
                        </a>
                    <?else:?>
                        <b><?=GetMessage('number_group');?></b>
                    <?endif;?>
                </li>
            <?else:?>
                <?foreach(GetMessage('number_chars') as $n_ch):?>
                    <li>
                        <?if(in_array($n_ch, $arResult['letters']) && !empty($arResult['list'][$n_ch])):?>
                            <span class="alph_active"><?=$n_ch;?></span>
                            <ul>
                                <?foreach($arResult['list'][$n_ch] as $arItem):?>
                                    <li><a href="<?=$arItem['DETAIL_PAGE_URL'];?>" rel="nofollow"><?=$arItem['NAME'];?></a></li>
                                <?endforeach;?>
                            </ul>
                        <?else:?>
                            <span><?=$n_ch;?></span>
                        <?endif;?>
                    </li>					
                <?endforeach;?>
            <?endif;?>
            <?if($arParams["SHOW_ALL"]):?>
                <li>
                    <?if($_REQUEST["letter"]!="all"):?>
                        <a href='<?=$APPLICATION->GetCurPageParam("letter=all", array("letter"));?>' rel="nofollow">
                            <?=GetMessage('all');?>
                        </a>
                    <?else:?>
                        <b><?=GetMessage('all');?></b>
                    <?endif;?>
                </li>
            <?endif;?>
        </ul>
    <?endif;?>
</div>
<div style="clear:both"></div>