<?
	require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
	
	if(isset($_POST['name'])) {
		$APPLICATION->IncludeComponent(
    	"myComponents:respond",
	    ".default",
	    Array(
	    )
);

	}