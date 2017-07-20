<?
  class vacancyAgent {

    private function prepareSort() {
      $sort = array(
          "active_from" => "desc",
          "name" => "asc",
      );
      return $sort;
    }

    private function prepareFilter($block_id) {
      $filter = array(
          "ACTIVE" => "Y",
          "IBLOCK_ID" => $block_id,
      );
      return $filter;
    }

    private function chooseProperties() {
          return array("ID", "IBLOCK_ID", "PROPERTY_DEACTIVATETIME");
    }

    private static function changeList($list) {
      $element = $listOfElements->GetNextElement();
      while ($element) {
        $fieldsOfEl = $element -> GetFields();
        $today = new DateTime();
        $vacancyDeactivateTime = DateTime::createFromFormat("d.m.Y", $fieldsOfEl[PROPERTY_DEACTIVATETIME]);
        if ($today >= $vacancyDeactivateTime && $vacancyDeactivateTime != false) {
          $newElement = new CIBlockElement();
          $deactivate = array(
            "ACTiVE" = "N";
          )
          $newElement -> Update($fieldsOfEl["ID"], $deactivate);

        }
        $element = $listOfElements->GetNextElement();
      }
    }


    public function deactivateVacancy() {
      $block_id = "6";
      CModule::IncludeModule("iblock");
      $listOfElements = CIBlockElement::GetList(self::prepareSort(), self::prepareFilter($block_id), false, false, self::chooseProperties());
      self::changeList($listOfElements);
      return "vacancyAgent::deactivateVacancy()";
    }
  }
?>
