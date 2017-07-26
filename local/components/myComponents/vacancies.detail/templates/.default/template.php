<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $arResult;
?>
<div class="container">
    <div class="row">
        <h2><?=$arResult["ITEM"]["NAME"]?></h2>
        <p>Зарплата: от <?=$arResult["ITEM"]["PROPERTIES"]["payment"]["VALUE"]?> - до <?=$arResult["ITEM"]["PROPERTIES"]["payment_up_to"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["SPECIAL"]["VALUE"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["employer"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["employer"]["OBJECT"]["NAME"]?></p>
        <p><?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["NAME"]?>: <?=$arResult["ITEM"]["PROPERTIES"]["deactivateTime"]["VALUE"]?></p>
        <?
            global $USER;
            if ($USER->IsAuthorized()) {
            ?>
                <script type="text/javascript">
                    $(function(){
                        $("#dialog").dialog({
                            autoOpen: false,
                            dialogClass: "resp",
                            modal: true,
                            minWidth: 500,
                            maxWidth: 500,
                            buttons: {
                            Cancel: function() {
                                $( this ).dialog("close");
                            }
                            }
                        });
      
                        $("#opener").on("click", function() {
                            $("#dialog").dialog("open");
                        });

                        $("#submit").on("click", function() {
                            var formData = "new FormData()";

                                //присоединяем остальные поля
                                //formData.append('name', $('input#textOfrespond').val());

                                //отправляем через ajax
                                $.ajax({
                                    url: "/ajax.handler.php",
                                    type: "POST",
                                    dataType : "text", 
                                    cache: false,
                                    contentType: false,
                                    processData: false,         
                                    data: formData, //указываем что отправляем
                                    success: function(data){
                                        $("#dialog").dialog("close");
                                        // if(data.ok == 'Y'){                                            
                                        //     $('#message_form').html('<p style="color: green; text-align: center; margin: 20px 0;">Сообщение успешно отправлено!<br>В ближайшее время мы свяжемся с Вами!</p>');
                                        //     setTimeout(function() { $('#message_form').html(' '); }, 8000);
                                        // }else{
                                        //     $('#message_form').html('<p style="color: red; text-align: center; margin: 20px 0;">Сообщение не может быть отправлено!<br>Попробуйте позже!</p>');
                                        //     setTimeout(function() { $('#message_form').html(' '); }, 8000);                 
                                        // }
                                    },
                                    error: function(xhr, status, error) {
                                        alert(xhr.responseText + '|\n' + status + '|\n' +error);
                                    }
                                });
                        });
                        });
                </script>
                <div id="dialog" title="Откликнуться на вакансию">
                    <form method="POST" id="respondForm" action="">
                        Ваше письмо:<br>
                        <textarea id="textOfrespond" rows="10" cols="45" name="text12"></textarea><br>
                        Ваши пожелания по зарплате:<br>
                        От: <input type="text" name="paymentFrom">
                        До: <input type="text" name="paymentTo"><br>
                        <input type="button" id="submit" name="submit" value="отправить">
                    </form> 
                </div>
                <button id="opener">Open Dialog</button>
            <?
            }
        ?>
        <p><a href="<?=$arResult["ITEM"]["LIST_PAGE_URL"]?>">Вернутся к списку</a></p>
    </div>
</div>
