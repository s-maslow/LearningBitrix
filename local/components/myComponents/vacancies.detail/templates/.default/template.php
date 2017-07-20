<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
?>
<div class="container">
    <div class="row">
        <h2><?=$arResult["ITEM"]["NAME"]?></h2>
        <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["employer"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        <form>
        	<input type="submit" name="IamHere" value="Отозваться"><br>
        </form>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
    </div>
</div>
