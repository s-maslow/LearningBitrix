<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="container">
    <div class="row">
            <h2><?=$arResult["DETAIL_PAGE"]["ITEM"]["NAME"]?></h2>
            <p>Зарплата: от <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p>Специальность: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
            <p>Работодатель: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_NAME"]?></p>
            <p>E-mail: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_EMAIL_VALUE"]?></p>
            <p>Адрес: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_ADRES_VALUE"]?></p>
            <p>Телефон: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_NUMBER_VALUE"]?></p>
            <p>Действует до: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
            <p><a href="<?=$arResult["DETAIL_PAGE"]["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
    </div>
    <hr>
    <h2>Отклики:</h2>
    <div class="filters">
        <h3>Фильтры</h3>
        <form method="post">



        </form>
    </div>
    <table>
        <tr>
            <th>Пользователь</th>
            <th>Сопроводительное письмо</th>
        </tr>
    <? foreach ($arResult["responses"] as $item): ?>
        <tr>
            <td><?=$item["USER"]["EMAIL"]?></td>
            <td><?=$item["COVERING_LETTER"]?></td>
        </tr>
    <? endforeach; ?>
    </table>
</div>
