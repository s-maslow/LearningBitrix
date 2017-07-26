<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;

?>
<div class="container">
    <div class="row">
        <div class = "main" id = "<?=$arResult["ITEM"]["ID"]?>">
        <h2><?=$arResult["ITEM"]["NAME"]?></h2>
        <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["employer"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
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
                        От: <input type="text" name="paymentFrom" id="payFrom">
                        До: <input type="text" name="paymentTo" id="payTo"><br>
                    </form> 
                </div>

                <button id="opener">Open Dialog</button>
                <div class = "response"></div>
                <button id="hide">hide opener</button>
            <?
            }
        ?>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>

    </div>
</div>
