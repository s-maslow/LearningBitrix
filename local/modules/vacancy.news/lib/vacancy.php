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
        $this->result["LIST"]["NAV_STRING"] = $listOfElements->GetPageNavStringEx(
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
            $this->result["LIST"]["ITEMS"][] = $item;
            $this->result["LIST"]["ELEMENTS"][] = $item["ID"];
            $element = $list->GetNextElement();
        }
        return $fieldsResults;
    }

    public function makeDetailVacancy($sort, $filters, $properties, $detailPageUrl, $listPageUrl) {
        CModule::IncludeModule("iblock");
        $rsVacancy = CIBlockElement::GetList($sort, $filters, false, false, $properties);
        $rsVacancy->SetUrlTemplates($detailPageUrl, "", $listPageUrl);
        $this->result["ITEM"] = self::getDetailPageFields($rsVacancy);
        return $this->result;
    }

    private static function getDetailPageFields($list) {
        $vacancy = $list->GetNextElement();
        if($vacancy !== false) {
            $item = $vacancy->GetFields();
            $item["PROPERTIES"] = $vacancy->GetProperties();
        }
        else {
            header("Location: /404.php");
        }
        return $item;
    }
}