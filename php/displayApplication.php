<?php
// http://mayar.abertay.ac.uk/~1304883/appforeducation/php/displayApplication.php

ini_set("display_errors", 1);
error_reporting(E_ALL);

// Database Connection
if(isset($_GET['app_id'])) {
	$con = mysql_connect("********", "********", "********");
	@mysql_select_db("********") or die("Unable to select database");
	$sql = "SELECT afe_app.*, AVG(review_rate) AS rate_avg FROM afe_app LEFT JOIN afe_review ON app_id = review_app";
	$sql = $sql . "WHERE app_id = " . $_GET['app_id'];
	$result = mysql_query($sql);
	$sql2 = "SELECT afe_review.* FROM afe_app LEFT JOIN afe_review ON app_id = review_app WHERE app_id = " . $_GET['app_id'];
	$result2 = mysql_query($sql2);
	mysql_close();
}
?>
