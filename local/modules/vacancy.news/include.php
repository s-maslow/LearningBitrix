<?php
CModule::IncludeModule("vacancy.news");
global $DBType;
$arClasses=array(
    'vacancyNews'=>'lib/vacancy.php',
    'employer'=>'lib/employer'
);
CModule::AddAutoloadClasses("vacancy.news",$arClasses);