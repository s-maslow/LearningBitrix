<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die(); ?>

<?
    if(!empty($_POST)) {
        if(isset($_POST["login"]) && isset($_POST["password"])) {
            $auth = $USER->Login($_POST["login"], $_POST["password"]);
            if($auth !== true) {
                ShowMessage($auth);
            }
        }
    }

    if(isset($_POST["logout"]))
        $USER->Logout();
?>
    <? $this->IncludeComponentTemplate(); ?>

