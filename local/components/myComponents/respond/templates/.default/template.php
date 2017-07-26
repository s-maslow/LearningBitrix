<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
  });
</script>
 <div id="dialog" title="Откликнуться на вакансию">
  <form method="post" id="respondForm" action="">
    Ваше письмо:<br>
  	<textarea id="textOfrespond" rows="10" cols="45" name="text12"></textarea><br>
    Ваши пожелания по зарплате:<br>
    От: <input type="text" name="paymentFrom">
    До: <input type="text" name="paymentTo"><br>
    <input type="submit" id="submit" name="submit" value="отправить">
  </form> 
</div>
<button id="opener">Open Dialog</button>
