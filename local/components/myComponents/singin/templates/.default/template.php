<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<h2>Авторизация</h2><br>
<form action="<?=POST_FORM_ACTION_URI?>" method="post">
  email:<input type="text" name="EMAIL"><br>
  password:<input type="password" name="PASSWORD"><br>
  <input type="submit"  value="do it" name = "SUBMIT"><br>
</form>
