<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");
$el = new CIBlockElement;
$fields = array
(
    "ACTIVE" => "Y",
    "NAME" => $_POST["vacancyID"]." ".$USER->GetId(),
    "IBLOCK_ID" => 7,
    "PROPERTY_VALUES" => array
    (
        vacancyId => $_POST["vacancyID"],
        userId => $USER->GetId(),
        textOfRespond => $_POST["textOfrespond"],
        paymentFrom => $_POST["paymentFrom"],
        paymentTo => $_POST["paymentTo"]
    ),
);
$arResult['responceId'] = $el->Add($fields);
$this->includeComponentTemplate();
?>