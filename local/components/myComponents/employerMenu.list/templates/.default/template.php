<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
?>

<div class="container">
    <!--Items-->
    <? foreach ($arResult["ITEMS"] as $item): ?>    
        <div class="rowOfvacancy">
            <h3><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h3>
            <p>Зарплата: от <?=$item["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$item["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$item["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
        </div>
    <? endforeach; ?>

    <!--Pagination-->
    <div class="row">
        <?=$arResult["NAV_STRING"];?>
    </div>

</div>
