<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TESTING SITE");

$APPLICATION->IncludeComponent(
	"myComponents:singin",
	"",
	Array()
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
