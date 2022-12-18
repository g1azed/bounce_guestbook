<?session_start();?>
<?
include "../inc/db/db.php"; 
$ipcc_db = db_connect();
?>
<?

    $data = json_decode($_POST['data']);

    $datClass = new stdClass();
    $arr = array();

    $contentsId = $data[0];
    $sql = "SELECT ID FROM CONTENTS WHERE ID=$contentsId;";
    $result = db_exec($ipcc_db, $sql);
    $row = db_numrows($result);
    if ($row > 0){
        $sql = "delete from CONTENTS where ID=$contentsId;";
        $result = db_exec($ipcc_db, $sql);
        $datClass->state = "success";
    }
    else {
        $datClass->state = "fail";
    }
    

    $arr[] = $datClass;
    unset($datClass);

    echo json_encode($arr);
?>
