<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;

?>
<div class="container">
    <div class="row">
        <div class = "main" id = "<?=$arResult["ITEM"]["ID"]?>">
            <h2><?=$arResult["ITEM"]["NAME"]?></h2>
            <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
            <p>Специальность: <?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
            <p>Работодатель: <?=$arResult["ITEM"]["PROPERTY_EMPLOYER_NAME"]?></p>
            <p>E-mail: <?=$arResult["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_EMAIL_VALUE"]?></p>
            <p>Адрес: <?=$arResult["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_ADRES_VALUE"]?></p>
            <p>Телефон: <?=$arResult["ITEM"]["PROPERTY_EMPLOYER_PROPERTY_NUMBER_VALUE"]?></p>
            <p>Действует до: <?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
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

                <button id="opener">Откликнуться на вакансию</button>
                <div class = "response"></div>
            <?
            }
        ?>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
                </div>
</div>
