<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/style.css');?>">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <?$APPLICATION->ShowPanel()?>
    <div class="wrapper">
        <header class="header">
          <ul>
            <il><a class="navA" href="/index.php"><div class="nav"><h1>Главная</h1></div></a></il>
            <il><a class="navA" href="/auth.php"><div class="nav"><h1>Вход</h1></div></a></il>
            <il><a class="navA" href="/registration.php"><div class="nav"><h1>Регистрация</h1></div></a></il>
            <il><a class="navA" href="/vacancy/"><div class="nav"><h1>Вакансии</h1></div></a></il>
          </ul>
        </header>
