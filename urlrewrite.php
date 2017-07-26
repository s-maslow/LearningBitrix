<?php
$arUrlRewrite = array(
    array(
        "CONDITION" => "#^/vacancy/#",
        "RULE" => "",
        "PATH" => "/vacancies.php",
        "ID" => "my:vacancy",
    ),
    array(
        "CONDITION" => "#^/employermenu/#",
        "RULE" => "",
        "PATH" => "/employer.php",
        "ID" => "myComponent:employerMenu",
    ),
);
?>
