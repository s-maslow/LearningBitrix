<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Меню работодателя");
?>

<?
$APPLICATION->IncludeComponent(
    "myComponents:employerMenu",
    ".default",
    Array(
        "SEF_FOLDER" => "/employermenu/",
        "IBLOCK_ID" => "6",
        "DETAIL_PAGE_URL" => "/employermenu/#ELEMENT_ID#/",
        "LIST_PAGE_URL" => "/employermenu/",
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
