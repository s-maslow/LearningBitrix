<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
?>

<div class="container">
    <div class="filter">
        <form method="POST" action="">
            Размер зарплаты:<br>
            от: <input type="text" name="from">
            до: <input type="text" name="to"><br>
            Работодатель:
            <select name="employer">
                <? foreach ($arResult["employersList"] as $empl): ?>
                    <option><?=$empl["PROPERTY_NAZVANIE_VALUE"];?></option>
                <? endforeach; ?>
            </select>
            <br>
            <input type="submit" name="filter" value="apply">
        </form>
    </div>
    <!--Items-->
    <? foreach ($arResult["vacancyList"]["LIST"]["ITEMS"] as $item): ?>
        <div class="row">
            <h3><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h3>
            <p>Зарплата: от <?=$item["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$item["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$item["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
            <p><?=$item["PROPERTIES"]["employer"]["NAME"]?>: <?=$item["PROPERTY_EMPLOYER_NAME"]?></p>
        </div>
    <? endforeach; ?>

    <!--Pagination-->
    <div class="row">
        <?=$arResult["vacancyList"]["NAV_STRING"];?>
    </div>

</div>
