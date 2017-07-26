<?php
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

  //-----------------------------------------------------------------------------
  //Добавление тип инфоблока Откликов
  //-----------------------------------------------------------------------------

     $arFields = Array(
       'ID' => 'responses',
       'SECTIONS'=>'Y',
       'IN_RSS'=>'N',
       'SORT'=>100,
       'LANG'=>Array(
           'en'=>Array(
             'NAME'=>'responses'
           ),
           'ru'=>Array(
             'NAME'=>'отклики'
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

//----------------------------------------------------------------------------------
//Добавление инфоблока отклика на Вакансии
//----------------------------------------------------------------------------------

  $IDrespToVacancy;
  $ib = new CIBlock;
  $arFields = Array(
    "NAME" => 'responsesToVacancy',
    "CODE" => 'resptvac',
    "IBLOCK_TYPE_ID" => 'responses',
    "SITE_ID" => 's1',
    "SORT" => 100,
    "DESCRIPTION_TYPE" => 'text',
    "GROUP_ID" => Array("2"=>"D", "3"=>"R")
  );
  if ($IDrespToVacancy > 0)
    $res = $ib -> Update($IDrespToVacancy, $arFields);
  else {
    $IDrespToVacancy = $ib -> Add($arFields);
    $res = ($IDrespToVacancy > 0);

    echo res;
  }