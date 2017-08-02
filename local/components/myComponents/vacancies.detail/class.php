<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class CVacancyDetail extends CBitrixComponent {

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
        global $arResult;
        CModule::IncludeModule("iblock");
        $rsVacancy = CIBlockElement::GetList(self::prepareSort(), self::prepareFilters($this->arParams["ELEMENT_ID"], $this->arParams["IBLOCK_ID"], $this->arParams["ELEMENT_ID"]), false, false, self::chooseProperties());
        $rsVacancy->SetUrlTemplates($this->arParams["DETAIL_PAGE_URL"], "", $this->arParams["LIST_PAGE_URL"]);
        $vacancy = $rsVacancy->GetNextElement();
        if($vacancy !== false) {
            $item = $vacancy->GetFields();
            $item["PROPERTIES"] = $vacancy->GetProperties();
           $arResult["ITEM"] = $item;
        }
        else {
            header("Location: /404.php");
        }
        $this->IncludeComponentTemplate();
    }
}
