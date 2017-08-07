<?

use \Bitrix\Main\Application;
use \Bitrix\Main\Entity\Base;
use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\Loader;

Class maslow_vacancy extends CModule {

    function __construct() {
        $arModuleVersion = array();
        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");
        include(__DIR__ . '/version.php');
        $this->MODULE_ID = 'maslow.vacancy';
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = "Список вакансий";
        $this->MODULE_DESCRIPTION = "Модуль для получения различных списков вакансий";
    }


    function uninstallDb() {
        Application::getConnection(Maslow\Vacancy\ResponsesTable::getConnectionName())->
        queryExecute('drop table if exists ' . Base::getInstance('\Maslow\Vacancy\ResponsesTable')->getDBTableName());
        \Bitrix\Main\Config\Option::delete($this->MODULE_ID);
    }

    function DoInstall() {
        global $DOCUMENT_ROOT, $APPLICATION;
        RegisterModule($this->MODULE_ID);
        self::installDb();
        $APPLICATION->IncludeAdminFile("Установка модуля vacancy.news", $DOCUMENT_ROOT."/local/modules/maslow.vacancy/install/step.php");
        return true;
    }

    function DoUninstall() {
        global $DOCUMENT_ROOT, $APPLICATION;
        self::uninstallDb();
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile("Деинсталляция модуля vacancy.news", $DOCUMENT_ROOT."/local/modules/maslow.vacancy/install/unstep.php");
        return true;
    }
}