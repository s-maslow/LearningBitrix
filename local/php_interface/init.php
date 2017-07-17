<?
session_start();
CModule::AddAutoloadClasses(
        '', // не указываем имя модуля
        array(
           // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
                'vacancyAgent' => '/local/classes/Agents/vacancyAgent.php'
        )
);
