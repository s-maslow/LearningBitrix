<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class CVacancyDetail extends CBitrixComponent {

    private static function getRespondList() {
        global $arResult;
        $sort = array(
            "active_from" => "desc",
            "name" => "asc",
        );
        $filter = array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => 7
        );
        $select = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_textOfRespond", "PROPERTY_userId", "PROPERTY_vacancyId", "PROPERTY_paymentFrom", "PROPERTY_paymentTo");
        $navPage = array(
            "nPageSize" => 10,
        );

        $listOfRespond = CIBlockElement::GetList($sort, $filter, false, $navPage, $select);

        $element = $listOfRespond->GetNextElement();
        while($element){
            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();
            $arResult["RESPOND_ITEMS"][] = $item;
            $element = $listOfRespond->GetNextElement();
        }

        $arResult["RESPOND_NAV_STRING"] = $listOfRespond->GetPageNavStringEx(
            $navComponentObject,
            "",
            "",
            "Y"
        );
    }

    

    public function executeComponent($rsVacancy)
    {
        global $arResult;
        CModule::IncludeModule("iblock");
        $arSort = array(
            "active_from" => "desc",
            "name" => "asc",
        );
        if(is_numeric($this->arParams["ELEMENT_ID"])) {
            $arFilter = array(
                "ACTIVE" => "Y",
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "ID" => $this->arParams["ELEMENT_ID"],
            );
        } else {
            $arFilter = array(
                "ACTIVE" => "Y",
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "CODE" => $this->arParams["ELEMENT_ID"],
            );
        }
        $rsVacancy = CIBlockElement::GetList($arSort, $arFilter);
        self::getRespondList();
        $rsVacancy->SetUrlTemplates($this->arParams["DETAIL_PAGE_URL"], "", $this->arParams["LIST_PAGE_URL"]);
        $vacancy = $rsVacancy->GetNextElement();
        if($vacancy !== false) {
            $item = $vacancy->GetFields();
            $item["PROPERTIES"] = $vacancy->GetProperties();
            foreach ($item["PROPERTIES"] as $key => $property) {
                if($property["PROPERTY_TYPE"] == "E"){
                    $sort = array(
                        "id" => "asc",
                    );
                    $filter = array(
                        "IBLOCK_ID" => $property["LINK_IBLOCK_ID"],
                        "ID" => $property["VALUE"],
                    );
                    $rsElements = CIBlockElement::GetList($sort, $filter);
                    $rsElement = $rsElements->GetNextElement();
                    if($rsElement !== false) {
                        $item["PROPERTIES"][$key]["OBJECT"] = $rsElement->GetFields();
                    }
                }
            }
            $arResult["ITEM"] = $item;
        }
        else {
            header("Location: /404.php");
        }
        $this->IncludeComponentTemplate();
    }
}
