<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="container">
    <div class="row">
        <div class = "main" id = "<?=$arResult["DETAIL_PAGE"]["ITEM"]["ID"]?>">
            <h2><?=$arResult["DETAIL_PAGE"]["ITEM"]["NAME"]?></h2>
            <p>Зарплата: от <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p>Специальность: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
            <p>Работодатель: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_NAME"]?></p>
            <p>E-mail: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_EMAIL_VALUE"]?></p>
            <p>Адрес: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_ADRES_VALUE"]?></p>
            <p>Телефон: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_NUMBER_VALUE"]?></p>
            <p>Действует до: <?=$arResult["DETAIL_PAGE"]["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
        </div>
        <?
            global $USER;
            if ($USER->IsAuthorized()) {
            ?>
                </script>
                <div id="dialog" title="Откликнуться на вакансию">
                    <form method="POST" id="respondForm" action="">
                    <p class="exceptions"></p>
                        Ваше письмо:<br>
                        <textarea id="textOfrespond" rows="10" cols="45" name="text12"></textarea><br>
                        Ваши пожелания по зарплате:<br>
                        От: <input class="pay" type="text" name="paymentFrom" id="payFrom">
                        До: <input class="pay" type="text" name="paymentTo" id="payTo"><br>
                    </form> 
                </div>
                    <? if($arResult["isRespond"] === "Y"): ?>
                         <button id="opener">Откликнуться на вакансию</button>
                    <?elseif($arResult["isRespond"] === "N"):?>
                         <button id='responseVacancy' disabled>Вы уже откликнулись</button>
                    <?endif;?>
                <div class = "response"></div>
            <?
            }
        ?>
        <p><a href="<?=$arResult["DETAIL_PAGE"]["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
                </div>
</div>
