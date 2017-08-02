<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
        return array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PAYMENT", "PROPERTY_PAYMENT_UP_TO", "PROPERTY_SPECIAL", "PROPERTY_EMPLOYER");
    }

    private static function paramsOfNavigation($pageSize) {
        return array(
            "nPageSize" => $pageSize,
        );

    }

    private static function takeVacancyFields($listOfElements) {
        global $arResult;
        $element = $listOfElements->GetNextElement();
        while($element){
            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();
            $arResult["ITEMS"][] = $item;
            $arResult["ELEMENTS"][] = $item["ID"];
            $element = $listOfElements->GetNextElement();
        }
    }

    private static function prepareNavigationString($listOfElements){
            return $listOfElements->GetPageNavStringEx(
            $navComponentObject,
            "",
            "",
            "Y"
        );
    }

    public function executeComponent($property) {
        global $arResult;
        CModule::IncludeModule("iblock");

        $listOfElements = CIBlockElement::GetList(self::prepareSort(), self::prepareFilter($this->arParams["IBLOCK_ID"]), false, self::paramsOfNavigation($this->arParams["PAGE_SIZE"]), self::chooseProperties());
        $listOfElements->SetUrlTemplates($this->arParams["DETAIL_PAGE_URL"], "", $this->arParams["LIST_PAGE_URL"]);
        
        self::takeVacancyFields($listOfElements);

        $arResult["NAV_STRING"] = self::prepareNavigationString($listOfElements);

        $this->includeComponentTemplate();
    }
}
