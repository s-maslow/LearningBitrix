<?php

namespace Maslow\Vacancy;

use \Bitrix\Main\Entity;

Class ResponsesTable extends Entity\DataManager {

    public static function test()
    {
        echo __CLASS__;die();
    }

    public static function getTableName() {
        return "response_vacancy";
    }

    public static function getMap() {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            new Entity\IntegerField("VACANCY", array(
                'required' => true,
            )),
            new Entity\IntegerField("USER", array(
                'required' => true,
            )),
            new Entity\TextField('COVERING_LETTER', array(
                "required" => true,
            )),
            new Entity\IntegerField('PAYMENT_LOW', array(
                "required" => true,
            )),
            new Entity\IntegerField('PAYMENT_HIGH', array(
                "required" => true,
            )),
        );
    }

}
?>