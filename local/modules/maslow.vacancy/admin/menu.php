<?
if($APPLICATION->GetGroupRight("form")>"D") // проверка уровня доступа к модулю веб-форм
{
    // сформируем верхний пункт меню
    $aMenu = array(
        "parent_menu" => "global_menu_content", // поместим в раздел "Сервис"
        "sort"        => 100,                    // вес пункта меню
        "url"         => "respond_list.php",  // ссылка на пункте меню
        "text"        => "Отклики на вакансии",       // текст пункта меню
        "title"       => "Отклики на вакансии", // текст всплывающей подсказки
        "items_id"    => "menu_respond",  // идентификатор ветви
        "items"       => array(),          // остальные уровни меню сформируем ниже.
        "module_id"   => "maslow.vacancy",
    );

    return $aMenu;
}
// если нет доступа, вернем false
return false;
?>