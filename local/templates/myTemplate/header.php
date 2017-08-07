<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/style.css');?>">
</head>

<body>
    <?$APPLICATION->ShowPanel()?>
    <div class="wrapper">
        <header class="header">
            <ul>
                <il><a class="navA" href="/index.php"><div class="nav"><h2>Главная</h2></div></a></il>
                <il><a class="navA" href="/auth.php"><div class="nav"><h2>Вход</h2></div></a></il>
                <il><a class="navA" href="/registration.php"><div class="nav"><h2>Регистрация</h2></div></a></il>
                <il><a class="navA" href="/vacancy/"><div class="nav"><h2>Вакансии</h2></div></a></il>
                <? if(in_array(6, $USER->GetUserGroupArray())):?>
                    <il><a class="navA" href="/employermenu/"><div class="nav"><h2>Меню работодателей</h2></div></a></il>
                <? endif; ?>
            </ul>
        </header>
