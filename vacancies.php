<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Вакансии");
?>

<?
$APPLICATION->IncludeComponent(
    "myComponents:vacancies",
    ".default",
    Array(
        "SEF_FOLDER" => "/vacancy/",
        "IBLOCK_ID" => "5",
        "DETAIL_PAGE_URL" => "/vacancy/#ELEMENT_ID#/",
        "LIST_PAGE_URL" => "/vacancy/",
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
