<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST["PAGE"] == "FORM")
{
    $APPLICATION->IncludeComponent(
        "myComponents:vacancyRespond",
        ".default",
        array(),
        false);
}
?>