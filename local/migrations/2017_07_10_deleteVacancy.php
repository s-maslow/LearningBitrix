<?
if (PHP_SAPI != 'cli')
  die();

  @set_time_limit(0);
  @ignore_user_abort(true);

  $_SERVER["DOCUMENT_ROOT"] = realpath(__DIR__ . '/../../');
  $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

  // Если инициализировать данную константу каким либо значением, то это запретит сбор статистики на данной странице.
  define('NO_KEEP_STATISTIC', true);
  // Если инициализировать данную константу значением "true" до подключения пролога, то это отключит проверку прав на доступ к файлам и каталогам.
  define('NOT_CHECK_PERMISSIONS', true);
  define('CHK_EVENT', true);
  // При установке в true отключает выполнение всех агентов
  define("NO_AGENT_CHECK", true);

  /** @noinspection PhpIncludeInspection */
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

  CModule::IncludeModule("iblock");

//--------------------------------------------------------------------------------
$DB->StartTransaction();
if(!CIBlock::Delete(5))
{
  $strWarning .= GetMessage("IBLOCK_DELETE_ERROR");
  $DB->Rollback();
}
else
  $DB->Commit();
//---------------------------------------------------------------------------------
$IDvacancy;
$ib = new CIBlock;
$arFields = Array(
  "NAME" => 'vacancy',
  "CODE" => 'qwerty12',
  "IBLOCK_TYPE_ID" => 'vacancy',
  "SITE_ID" => 's1',
  "SORT" => 100,
  "DESCRIPTION_TYPE" => 'text',
  "GROUP_ID" => Array("2"=>"D", "3"=>"R")
);
if ($IDvacancy > 0)
  $res = $ib->Update($IDemployer, $arFields);
else {
  $IDvacancy = $ib->Add($arFields);
  $res = ($IDvacancy > 0);
}
//-----------------------------------------------------------------------------------
$arFields = Array(
  "NAME" => "Название",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "NameOf",
  "PROPERTY_TYPE" => "S",
  "IS_REQUIRED" => "Y",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Специализация",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "SPECIAL",
  "PROPERTY_TYPE" => "S",
  "IS_REQUIRED" => "Y",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Работодатель",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "employer",
  "PROPERTY_TYPE" => "E",
  "LINK_IBLOCK_ID" => 3	,
  "IS_REQUIRED" => "Y",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Зарплата от",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "payment",
  "PROPERTY_TYPE" => "N",
  "IS_REQUIRED" => "Y",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Зарплата до",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "payment_up_to",
  "PROPERTY_TYPE" => "N",
  "IS_REQUIRED" => "Y",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Задание",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "task",
  "PROPERTY_TYPE" => "F",
  "IS_REQUIRED" => "N",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);

$arFields = Array(
  "NAME" => "Действует до...",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "deactivateTime",
  "PROPERTY_TYPE" => "S",
  "IS_REQUIRED" => "N",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);
