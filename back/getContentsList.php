<?session_start();?>
<?
include "../inc/db/db.php"; 
$ipcc_db = db_connect();
?>
<?
$arr = array();
$datas = array();

$sql = "SELECT * FROM CONTENTS ORDER BY ID DESC";
$result = db_exec($ipcc_db, $sql);
$row = db_numrows($result);
$rowCount = 0;
if ( $row > 0 ) {
    while($row = db_fetch_array($result)){
        $datas[$rowCount] = new stdClass();
        $datas[$rowCount]->id = $row['ID'];
        $datas[$rowCount]->nick = $row['NICK'];
        $datas[$rowCount]->contents = $row['CONTENTS'];
        $datas[$rowCount]->regDate = date("Y-m-d", strtotime($row['REG_DATE']));
        $rowCount++;
    }
}
else {
    $datas[$rowCount]->state = "fail";
}
$arr[] = $datas;
echo json_encode($arr); 
db_close($ipcc_db);
?>