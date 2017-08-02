<?
Class vacancy_news extends CModule
{
    var $MODULE_ID = "vacancy.news";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    function __construct() {
        $arModuleVersion = array();
        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = "Список вакансий";
        $this->MODULE_DESCRIPTION = "Модуль для получения различных списков вакансий";
    }
    function DoInstall() {
        global $DOCUMENT_ROOT, $APPLICATION;
        RegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile("Установка модуля vacancy.news", $DOCUMENT_ROOT."/local/modules/vacancy.news/install/step.php");
        return true;
    }
    function DoUninstall() {
        global $DOCUMENT_ROOT, $APPLICATION;
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile("Деинсталляция модуля vacancy.news", $DOCUMENT_ROOT."/local/modules/vacancy.news/install/unstep.php");
        return true;
    }
}