<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	$this->IncludeComponentTemplate();
	if(isset($_POST['text'])){
		echo $_POST['text'];
  	} 
  
?>