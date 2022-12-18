<?session_start();?>

<?
	$_SESSION['isAdmin'] = "";
?>

<SCRIPT LANGUAGE="javascript">
    alert("로그아웃 합니다.");
    location.href = "../index.php";
</script>