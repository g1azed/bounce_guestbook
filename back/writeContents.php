<?session_start();?>
<?
include "../inc/db/db.php"; 
$ipcc_db = db_connect();
?>

<?

    $nickname  =  $_POST['nickname'];
	$contents =  $_POST['contents'];
    
    $sql = "INSERT INTO CONTENTS (NICK, CONTENTS) VALUES('$nickname', '$contents')";
    
    $result = db_exec($ipcc_db, $sql);



?>
<SCRIPT LANGUAGE="javascript">
		location.href = "../index.php";
</script>