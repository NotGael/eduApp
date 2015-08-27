<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	$con = mysql_connect("********", "********", "********");
	@mysql_select_db("********") or die("Unable to select database");
	if (isset($_POST['login']) && isset($_POST['password']) && $con) {
		$sqlLogin = "SELECT user_id FROM afe_user WHERE user_login = \"" . $_POST['login'] ."\" AND user_password = \"" . $_POST['password'] . "\"";
  		$resultLogin = mysql_query($sqlLogin);
		$db_fieldLogin = mysql_fetch_assoc($resultLogin);
    	if (!$db_fieldLogin) {
			mysql_close();
			header('Location: ../index.php');
		}
    	else {
			session_start();
        	$_SESSION['id'] = $db_fieldLogin['user_id'];
			$_SESSION['login'] = $_POST['login'];
			mysql_close();
        	header('Location: ../index.php');
		}
	}
	else {
		echo "Error no login or password!";
	}
?>
