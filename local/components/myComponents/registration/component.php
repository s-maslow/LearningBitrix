<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->IncludeComponentTemplate();
if (isset($_REQUEST['NAME']) && isset($_REQUEST["EMAIL"]) && isset($_REQUEST["PASSWORD"]) && isset($_POST['CONFIRMPASS']) && isset($_REQUEST["SUBMIT"])){
  $user = new CUser;
  $userInf = Array(
    "LOGIN" => trim($_REQUEST['EMAIL']),
    "EMAIL" => trim($_REQUEST['EMAIL']),
    "NAME" => trim($_REQUEST['NAME']),
    "PASSWORD" => trim($_REQUEST['PASSWORD']),
    "CONFIRM_PASSWORD" => trim($_REQUEST['CONFIRMPASS'])
  );
  $id = $user->Add($userInf);
  $arResult = $id;
  if(intval($id) > 0){
    echo "Вы успешно зарегестрированы";
  } else {
    echo $user->LAST_ERROR;
  }
}
?>
