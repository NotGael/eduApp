<?php
	session_start();
	$id = $_SESSION['id'];
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	if(isset($_POST['rate']) && isset($_POST['comment']) && isset($_POST['app']) && isset($_POST['user']) && isset($_POST['pastReview'])) {
		//echo $_POST['rate'];
		//echo $_POST['comment'];
		//echo $_POST['app'];
		//echo $_POST['user'];
		date_default_timezone_set("Europe/London");
		$date = date('Y-m-d', time());
		//Database Connection
		$con = mysql_connect("********", "********", "********");
		@mysql_select_db("********") or die("Unable to select database");
		if($_POST['pastReview'] == 0) {
			$sqlReview = "INSERT INTO afe_review (review_comment, review_rate, review_user, review_app, review_date) VALUE";
			$sqlReview = $sqlReview . " (\"" . $_POST['comment'] . "\", " . $_POST['rate'] . ", " . $_POST['user'] . ", " . $_POST['app'] . ", \"" . $date . "\")";
			$resultReview = mysql_query($sqlReview);
			if (!$resultReview) {
		    	die('Invalid query: ' . mysql_error());
			}
			else {
				header('Location: application.php?app_id='.$_POST['app']);
			}
		}
		else {
			$sqlReview = "UPDATE afe_review SET review_comment = \"" . $_POST['comment'] . "\", review_rate = \"" . $_POST['rate'] . "\", review_user = \"" . $_POST['user'] . "\", review_app = \"" . $_POST['app'] . "\", review_date = \"" . $date . "\", review_moderated = \"0\" WHERE review_app = \"" . $_POST['app'] . "\" AND  review_user = \"" . $_POST['user'] . "\"";
			$resultReview = mysql_query($sqlReview);
			if (!$resultReview) {
		    	die('Invalid query: ' . mysql_error());
			}
			else {
				header('Location: application.php?app_id='.$_POST['app']);
			}
		}
	}
	mysql_close();
?>
