<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Maslow\Vacancy\ResponsesTable;
use Maslow\Vacancy\Vacancy;

class CVacancyDetail extends CBitrixComponent {

    private static function getUserEmail(&$listOfRespond) {
        foreach ($listOfRespond as &$item) {
            $temp = $item["USER"];
            $item["USER"] = array(
                "ID" => $temp,
                "EMAIL" => ""
            );
            $user = CUser::GetByID($item['USER'])->Fetch();
            $item["USER"]["EMAIL"] = $user["EMAIL"];
        }
        unset($item);
    }

    private function getRespondList($vacancyID) {
        $result = ResponsesTable::getList(array(
            'filter' => array(
                "VACANCY" => $vacancyID,
            )
        ))->fetchAll();
        self::getUserEmail($result);
        return $result;
    }

    private static function chooseProperties() {
        return array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PAYMENT", "PROPERTY_PAYMENT_UP_TO", "PROPERTY_SPECIAL", "PROPERTY_EMPLOYER.NAME", "PROPERTY_EMPLOYER.PROPERTY_EMAIL", "PROPERTY_EMPLOYER.PROPERTY_ADRES", "PROPERTY_EMPLOYER.PROPERTY_NUMBER");
    }

    private static function prepareSort() {
        return array(
            "active_from" => "desc",
            "name" => "asc",
        );
    }

    private  static function prepareFilters($id, $iBlockID, $elementID) {
        if(is_numeric($id)) {
            $arFilter = array(
                "ACTIVE" => "Y",
                "IBLOCK_ID" => $iBlockID,
                "ID" => $elementID,
            );
        } else {
            $arFilter = array(
                "ACTIVE" => "Y",
                "IBLOCK_ID" => $iBlockID,
                "CODE" => $elementID,
            );
        }
        return $arFilter;
    }

    public function executeComponent($rsVacancy) {
        if(\Bitrix\Main\Loader::IncludeModule("maslow.vacancy")) {
            $someVacancy = new Vacancy("DetailOfVacancy");
            $this->arResult["DETAIL_PAGE"] = $someVacancy->makeDetailVacancy(self::prepareSort(), self::prepareFilters($this->arParams["ELEMENT_ID"], $this->arParams["IBLOCK_ID"], $this->arParams["ELEMENT_ID"]), self::chooseProperties(), $this->arParams["DETAIL_PAGE_URL"], $this->arParams["LIST_PAGE_URL"]);
            $this->arResult["responses"] = $this->getRespondList($this->arParams["ELEMENT_ID"]);
        }
        $this->IncludeComponentTemplate();
    }
}
