<?session_start();?>
<?
include "../inc/db/db.php"; 
$ipcc_db = db_connect();
?>

<?
    $dat = json_decode($_POST['data']);

    $arr = array();
    $dataCls = new stdClass();

    if(isset($dat)){

        $pw = rtrim($dat[0]); 
        
        $sql = "SELECT * FROM ADMIN_PW WHERE PW='$pw';";

        $result = db_exec($ipcc_db, $sql);
        $res = db_fetch_array($result);
        $row = db_numrows($result);
        
        if ( $row > 0 ) {
            $_SESSION['isAdmin'] = 1;
            $dataCls->state = "suc";
        }
        else {
            $dataCls->state = "fail";
        }   
        
        
        $arr[] = $dataCls;
        unset($dataCls);
        
        echo json_encode($arr);   
    }
    
    db_close($ipcc_db);
?>