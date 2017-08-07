<?
// подключим все необходимые файлы:
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php"); // первый общий пролог

use Maslow\Vacancy\ResponsesTable;


// получим права доступа текущего пользователя на модуль
$POST_RIGHT = $APPLICATION->GetGroupRight("subscribe");
// если нет прав - отправим к форме авторизации с сообщением об ошибке
if ($POST_RIGHT == "D")
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
?>
<?
$sTableID = "respond_list";
$respondTable = new CAdminList($sTableID, false);

// проверку значений фильтра для удобства вынесем в отдельную функцию
function CheckFilter() {
    global $FilterArr, $respondTable;
    foreach ($FilterArr as $f) global $$f;

    /*
       здесь проверяем значения переменных $find_имя и, в случае возникновения ошибки,
       вызываем $lAdmin->AddFilterError("текст_ошибки").
    */

    return count($respondTable->arFilterErrors) == 0; // если ошибки есть, вернем false;
}

// опишем элементы фильтра
$FilterArr = Array(
    "find_id",
    "find_usid",
    "find_vacid",
);

// инициализируем фильтр
$respondTable->InitFilter($FilterArr);

// если все значения фильтра корректны, обработаем его
if (CheckFilter()) {
    // создадим массив фильтрации для выборки CRubric::GetList() на основе значений фильтра
    $arFilter = Array(
        "ID"		        => $find_id,
        "USER"		        => $find_usid,
        "VACANCY"	        => $find_vacid,
    );
}

$respondTable->AddHeaders(array(
        array(  "id"    =>"ID",
            "content"  =>"ID",
            "sort"     =>"id",
            "default"  =>true,
        ),
        array(  "id"    =>"USER",
            "content"  =>"ID пользователя",
            "sort"     =>"user",
            "default"  =>true,
        ),
        array(  "id"    =>"VACANCY",
            "content"  =>"ID вакансии",
            "sort"     =>"vacancy",
            "default"  =>true,
        ),
        array(  "id"    =>"COVERING_LETTER",
            "content"  =>"Сопроводительное письмо",
            "sort"     =>"coveringletter",
            "default"  =>true,
        ),
        array(  "id"    =>"PAYMENT_LOW",
            "content"  =>"Желаемая зарплата(нижняя граница)",
            "sort"     =>"paymentlow",
            "default"  =>true,
        ),
        array(  "id"    =>"PAYMENT_HIGH",
            "content"  =>"Желаемая зарплата(верхняя граница)",
            "sort"     =>"paymenthigh",
            "default"  =>true,
        ),
    ));

    $rsData = ResponsesTable::getList();

    // преобразуем список в экземпляр класса CAdminResult
    $rsData = new CAdminResult($rsData, $sTableID);

    // аналогично CDBResult инициализируем постраничную навигацию.
    $rsData->NavStart();
    $respondTable->NavText($rsData->GetNavPrint("страница"));
    // отправим вывод переключателя страниц в основной объект $lAdmin
  //  $lAdmin->NavText("qwerty");
while($arRes = $rsData->NavNext(true, "f_"))
    $respondTable->AddRow($f_ID, $arRes);

?>
<?
$APPLICATION->SetTitle("Отклики на вакансии");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>

    <?$oFilter = new CAdminFilter(
    $sTableID."_filter",
    array(
    "ID",
    "ID пользователя",
    "ID вакансии",
    )
    );
    ?>
    <form name="find_form" method="get" action="<?echo $APPLICATION->GetCurPage();?>">
        <?$oFilter->Begin();?>
        <tr>
            <td><?="ID"?>:</td>
            <td>
                <input type="text" name="find_id" size="47" value="<?echo htmlspecialchars($find_id)?>">
            </td>
        </tr>
        <tr>
            <td>ID пользователя</td>
            <td><input type="text" name="find_usid" size="47" value="<?echo htmlspecialchars($find_usid)?>"></td>
        </tr>
        <tr>
            <td>ID вакансии</td>
            <td><input type="text" name="find_vacid" size="47" value="<?echo htmlspecialchars($find_vacid)?>"></td>
        </tr>
        <?
        $oFilter->Buttons(array("table_id"=>$sTableID,"url"=>$APPLICATION->GetCurPage(),"form"=>"find_form"));
        $oFilter->End();
        ?>
    </form>

<?
$respondTable->DisplayList();
// здесь будет вывод страницы
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>