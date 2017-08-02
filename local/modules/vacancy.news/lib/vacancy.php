<?php
class vacancyNews {

    public $result = array();
    public $name;

    public  function __construct($listName) {
        $name = $listName;
    }

    public function makeVacancyList($filters, $sort, $properties, $nav, $detailPageUrl, $listPageUrl) {
        CModule::IncludeModule("iblock");
        $listOfElements = CIBlockElement::GetList($sort, $filters, false, $nav, $properties);
        $listOfElements->SetUrlTemplates($detailPageUrl, "", $listPageUrl);
        $this->getVacancyFields($listOfElements);
        $this->result["NAV_STRING"] = $listOfElements->GetPageNavStringEx(
            $navComponentObject,
            "",
            "",
            "Y"
        );
        return $this->result;
    }

    private function getVacancyFields($list) {
        $fieldsResults = array();
        $element = $list->GetNextElement();
        while($element){
            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();
            $this->result["ITEMS"][] = $item;
            $this->result["ELEMENTS"][] = $item["ID"];
            $element = $list->GetNextElement();
        }
        return $fieldsResults;
    }



}