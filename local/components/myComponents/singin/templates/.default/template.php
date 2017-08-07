<?php
    if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
?>
<?if($USER->GetId()==null):?>
    <form action="" method="post">
                <input type="text" name="login" placeholder="Login" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Войти</button><br>
    </form>
<?else:?>
    <p>авторизован как <?=$USER->GetLogin().GetMessage('AUTHO')?></p>
    <form action="" method="post">
        <input type="submit" name="logout" value="Выйти">
    </form>
<?endif?>
