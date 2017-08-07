<?
    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
    use Maslow\Vacancy\ResponsesTable;

    function add() {
        global $USER;
        return ResponsesTable::add(array(
            "VACANCY" => $_POST['vacancyID'],
            "USER" => $USER->GetId(),
            "COVERING_LETTER" => $_POST['textOfrespond'],
            "PAYMENT_LOW" => $_POST['paymentFrom'],
            "PAYMENT_HIGH" => $_POST['paymentTo']
        ));
    }
    function doItAll() {
        if ($_POST["PAGE"] == "FORM") {
            echo add()->isSuccess();
        }
    }
    doItAll();
?>