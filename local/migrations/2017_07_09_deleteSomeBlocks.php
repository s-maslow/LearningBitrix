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


//--------------------------------------------------------------------------------------------------
//удаление лишних инфоблоков
$DB->StartTransaction();
if(!CIBlock::Delete(5))
{
  $strWarning .= GetMessage("IBLOCK_DELETE_ERROR");
  $DB->Rollback();
}
else
  $DB->Commit();

  $DB->StartTransaction();
  if(!CIBlock::Delete(6))
  {
    $strWarning .= GetMessage("IBLOCK_DELETE_ERROR");
    $DB->Rollback();
  }
  else
    $DB->Commit();
