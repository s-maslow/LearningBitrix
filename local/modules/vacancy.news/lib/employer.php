<?php
class employers {

    public $listOfEmployers = array();

    public function __construct($iblockId) {
        CModule::IncludeModule("iblock");
        $list = CIBlockElement::GetList(array(
            "active_from" => "desc",
            "name" => "asc",
        ), array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $iblockId
        ), false, false, array("PROPERTY_NAZVANIE"));

        $element = $list->GetNextElement();
        while($element){
            $item = $element->GetFields();
            $item["PROPERTIES"] = $element->GetProperties();
            $this->listOfEmployers[] = $item;
            $element = $list->GetNextElement();
        }
    }


}