<?
date_default_timezone_set('Asia/Seoul');

function db_connect()
{
    
	$dbset = $_COOKIE['dbset'];
	$db = $_COOKIE['db'];
	$host = $_COOKIE['host'];
	$user = $_COOKIE['user'];
	$pass = $_COOKIE['pass'];
	//echo $dbset ."<br>". $db ."<br>". $user . "<br>". $pass;

	if( $dbset == "PostgreSQL" )
	{
		$s2 = "dbname=".$db." user=".$user." password=" .$pass;
		$ipcc_db= pg_connect($s2);
	}	
	else if( $dbset == "MySQL" )
	{
        $ipcc_db = mysqli_connect("$host", "$user","$pass", "$db");
		//$db_ok	= mysqli_select_db("$db",$ipcc_db);
		//mysqli_query('set names utf8');
	}
	else if( $dbset == "MsSQL" )
	{
		$ipcc_db= mssql_connect("$host", "$user","$pass");
		$db_ok	= mssql_select_db("$db",$ipcc_db);
//		mssql_query('set character_set_client = utf-8');
	}
	return $ipcc_db;
}


function db_exec($ipcc_db,$sql)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$result = pg_exec($ipcc_db, $sql);
	}	
	else if( $dbset == "MySQL" )
	{
		$result = mysqli_query($ipcc_db, $sql);
	}
	else if( $dbset == "MsSQL" )
	{
		$result = mssql_query($sql, $ipcc_db);
	}
	return $result;
}

function db_query($sql,$ipcc_db)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$result = pg_exec($ipcc_db, $sql);
	}	
	else if( $dbset == "MySQL" )
	{
		$result = mysqli_query($ipcc_db, $sql);
	}
	else if( $dbset == "MsSQL" )
	{
		$result = mssql_query($sql, $ipcc_db);
	}
	return $result;
}

function db_close($ipcc_db)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		pg_close($ipcc_db);
	}	
	else if( $dbset == "MySQL" )
	{
		mysqli_close($ipcc_db);
	}
	else if( $dbset == "MsSQL" )
	{
		mssql_close($ipcc_db);
	}
}


function db_fetch_array($result)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$data = pg_fetch_array($result);
	}	
	else if( $dbset == "MySQL" )
	{
		$data = mysqli_fetch_assoc($result);
	}
	else if( $dbset == "MsSQL" )
	{
		$data = mssql_fetch_array($result);
	}
	return $data;
}

function db_numrows($result)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$cnt = pg_numrows($result);
	}	
	else if( $dbset == "MySQL" )
	{
		$cnt = mysqli_num_rows($result);
	}
	else if( $dbset == "MsSQL" )
	{
		$cnt = mssql_num_rows($result);
	}
	return $cnt;
}

function db_num_rows($result)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$cnt = pg_numrows($result);
	}	
	else if( $dbset == "MySQL" )
	{
		$cnt = mysqli_num_rows($result);
	}
	else if( $dbset == "MsSQL" )
	{
		$cnt = mssql_num_rows($result);
	}
	return $cnt;
}

function db_fetch_row($result)
{
	$dbset = $_COOKIE['dbset'];
	if( $dbset == "PostgreSQL" )
	{
		$cnt = pg_fetch_row($result);
	}	
	else if( $dbset == "MySQL" )
	{
		$cnt = mysqli_fetch_row($result);
	}
	else if( $dbset == "MsSQL" )
	{
		$cnt = mssql_fetch_row($result);
	}
	return $cnt;
}
?>