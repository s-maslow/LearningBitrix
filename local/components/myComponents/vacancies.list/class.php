<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Maslow\Vacancy\Vacancy;
use Maslow\Vacancy\Employer;

class CVacancyList extends CBitrixComponent {

    private static function prepareSort() {
        return array(
            "active_from" => "desc",
            "name" => "asc",
        );
    }

    private static function prepareFilter($id) {
        return array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $id
        );
    }

    private static function chooseProperties() {
        return array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PAYMENT", "PROPERTY_PAYMENT_UP_TO", "PROPERTY_SPECIAL", "PROPERTY_EMPLOYER.NAME");
    }

    private static function paramsOfNavigation($pageSize) {
        return array(
            "nPageSize" => $pageSize,
        );

    }

    public function executeComponent($property) {
        global $arResult;
        if(\Bitrix\Main\Loader::IncludeModule("maslow.vacancy")) {
            $vacancy = new Vacancy("vacancyForUsers");
            $arResult["vacancyList"] = $vacancy->makeVacancyList(self::prepareFilter($this->arParams["IBLOCK_ID"]), self::prepareSort(), self::chooseProperties(), self::paramsOfNavigation($this->arParams["PAGE_SIZE"]), $this->arParams["DETAIL_PAGE_URL"], $this->arParams["LIST_PAGE_URL"]);
            $employer = new Employer(3);
            $arResult["employersList"] = $employer->listOfEmployers;
        }
        $this->includeComponentTemplate();
    }
}
