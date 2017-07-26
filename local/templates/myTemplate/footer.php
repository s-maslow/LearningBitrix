<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
</div>
<footer class="footer">
    <?
    use Bitrix\Main\Page\Asset;
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.2.1.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-ui.js");
    ?>
</footer>
</body>
</html>
