<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;

?>
<div class="container">
    <div class="row">
        <h2><?=$arResult["ITEM"]["NAME"]?></h2>
        <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
    </div>
    <hr>
    <h2>Отклики:</h2>
    <div class="filters">
        <h3>Фильтры</h3>
        <form method="post">



        </form>
    </div>

    <? foreach ($arResult["RESPOND_ITEMS"] as $item): ?>
        <div class="row">
            <h3><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h3>
            <p>Зарплата: от <?=$item["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$item["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["textOfRespond"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["employer"]["NAME"]?>: <?=$item["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        </div>
    <? endforeach; ?>

    <div class="row">
        <?=$arResult["RESPOND_NAV_STRING"];?>
    </div>
</div>
