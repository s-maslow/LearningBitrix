<?php
echo PHP_SAPI;
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



//-------------------------------------------------------------------------------------------------------
// Добавление типа инфоблока вакансии
  $arFields = Array(
      'ID' => 'vacancy',
      'SECTIONS'=>'Y',
      'IN_RSS'=>'N',
      'SORT'=>100,
      'LANG'=>Array(
          'en'=>Array(
            'NAME'=>'vacancies'
          ),
          'ru'=>Array(
            'NAME'=>'вакансии'
          )
      )
    );
  $obBlocktype = new CIBlockType;
  $DB->StartTransaction();
  $res = $obBlocktype->Add($arFields);
  if (!$res) {
    $DB->Rollback();
    echo 'Error: '.$obBlocktype->LAST_ERROR.'<br>';
  }
  else
    $DB->Commit();
//-------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------
//  добавление инфоблока работодатель
    $arFields = Array(
        'ID' => 'employer',
        'SECTIONS'=>'Y',
        'IN_RSS'=>'N',
        'SORT'=>100,
        'LANG'=>Array(
            'en'=>Array(
              'NAME'=>'employer'
            ),
            'ru'=>Array(
              'NAME'=>'работодатель'
            )
    )
        );
    $obBlocktype = new CIBlockType;
    $DB->StartTransaction();
    $res = $obBlocktype->Add($arFields);
    if (!$res) {
      $DB->Rollback();
      echo 'Error: '.$obBlocktype->LAST_ERROR.'<br>';
    }
    else
      $DB->Commit();
//----------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------
// Создание инфоблока работодатели
  $IDemployer;
  $ib = new CIBlock;
  $arFields = Array(
    "NAME" => 'employer',
    "CODE" => 'qwerty123',
    "IBLOCK_TYPE_ID" => 'employer',
    "SITE_ID" => Array("en", "de"),
    "SORT" => 100,
    "DESCRIPTION_TYPE" => 'text',
    "GROUP_ID" => Array("2"=>"D", "3"=>"R")
  );
  if ($IDemployer > 0)
    $res = $ib -> Update($IDemployer, $arFields);
  else {
    $IDemployer = $ib -> Add($arFields);
    $res = ($IDemployer > 0);
  }
//-------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------
// Создание инфоблока вакансии
  $IDvacancy;
  $ib = new CIBlock;
  $arFields = Array(
    "NAME" => 'vacancy',
    "CODE" => 'qwerty12',
    "IBLOCK_TYPE_ID" => 'vacancy',
    "SITE_ID" => Array("en", "de"),
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
//-------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------------
//добавление свойств в инфоблок работодатель
  $arFields = Array(
    "NAME" => "Название",
    "ACTIVE" => "Y",
    "SORT" => "50",
    "CODE" => "NAZVANIE",
    "PROPERTY_TYPE" => "S",
    "IS_REQUIRED" => "Y",
    "IBLOCK_ID" => $IDemployer,//номер вашего инфоблока
    "LIST_TYPE" => "L",
    "MULTIPLE" => "N"
  );
  $ibp = new CIBlockProperty;
  $PropID = $ibp->Add($arFields);

  $arFields = Array(
    "NAME" => "Адрес",
    "ACTIVE" => "Y",
    "SORT" => "50",
    "CODE" => "ADRES",
    "PROPERTY_TYPE" => "S",
    "IS_REQUIRED" => "Y",
    "IBLOCK_ID" => $IDemployer,//номер вашего инфоблока
    "LIST_TYPE" => "L",
    "MULTIPLE" => "N"
  );
  $ibp = new CIBlockProperty;
  $PropID = $ibp->Add($arFields);

  $arFields = Array(
    "NAME" => "Номер телефона",
    "ACTIVE" => "Y",
    "SORT" => "50",
    "CODE" => "NUMBER",
    "PROPERTY_TYPE" => "S",
    "IS_REQUIRED" => "Y",
    "IBLOCK_ID" => $IDemployer,//номер вашего инфоблока
    "LIST_TYPE" => "L",
    "MULTIPLE" => "N"
  );
  $ibp = new CIBlockProperty;
  $PropID = $ibp->Add($arFields);

  $arFields = Array(
    "NAME" => "E-mail",
    "ACTIVE" => "Y",
    "SORT" => "50",
    "CODE" => "EMAIL",
    "PROPERTY_TYPE" => "S",
    "IS_REQUIRED" => "Y",
    "IBLOCK_ID" => $IDemployer,//номер вашего инфоблока
    "LIST_TYPE" => "L",
    "MULTIPLE" => "N"
  );
  $ibp = new CIBlockProperty;
  $PropID = $ibp->Add($arFields);
//---------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------------
//Добавление свойств инфоблока Вакансии
$arFields = Array(
  "NAME" => "Название",
  "ACTIVE" => "Y",
  "SORT" => "50",
  "CODE" => "НАЗВАНИЕ",
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
  "CODE" => "EMPLOYERS",
  "PROPERTY_TYPE" => "E",
  "LINK_IBLOCK_ID" => $IDemployer,
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
  "CODE" => "SPECIAL",
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
  "CODE" => "SPECIAL",
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
  "CODE" => "SPECIAL",
  "PROPERTY_TYPE" => "F",
  "IS_REQUIRED" => "N",
  "IBLOCK_ID" => $IDvacancy,//номер вашего инфоблока
  "LIST_TYPE" => "L",
  "MULTIPLE" => "N"
);
$ibp = new CIBlockProperty;
$PropID = $ibp->Add($arFields);
//----------------------------------------------------------------------------------------------------------------------------


?>
