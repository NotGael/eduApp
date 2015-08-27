<?php
	// http://mayar.abertay.ac.uk/~1304883/appforeducation/php/displayAppList.php

	ini_set("display_errors", 1);
	error_reporting(E_ALL);

	// Display Application Function
	function displayApp($db_field) {
		print "<a href = \"php/application.php?app_id=" . $db_field['app_id'] . " \">";
		print "<div class = \"appInfo\">";
		print "<img class = \"appPicture\" src=\"" . $db_field['app_picture'] . "\" alt=\"Application Logo\">";
		switch($db_field['app_os']) {
			case "android":
				$color = "Green";
				break;
			case "ios":
				$color = "Red";
				break;
			case "windows":
				$color = "Violet";
				break;
		}
		print "<div class = \"appField\"><p class = \"appTitle" . $color . "\">" . $db_field['app_name'] . "</p>";
		print "<p class = \"appDescr\">" . $db_field['app_company'] . "<br />";
		print $db_field['app_version'] . "<br />";
		print $db_field['app_category'] . "<br />";
		$i = 1;
		while($i <= $db_field['rate_avg']) {
			print "<img src = \"images/star_full.png\" alt = \"starFull\">";
			$i++;
		}
		while($i <= 5) {
			print "<img src = \"images/star_empty.png\" alt = \"starEmpty\">";
			$i++;
		}
		print "</p>";

		if($db_field['app_price'] == 0) {
			print "<p class = \"appPrice\">Free</p>";
		}
		else {
			print "<p class = \"appPrice\">" . $db_field['app_price'] . " $</p>";
		}
		print "</div></div></a>";
	}

	// Database Connection
	$con = mysql_connect("********", "********", "********");
	@mysql_select_db("********") or die("Unable to select database");
	$sql = "SELECT afe_app.*, AVG(review_rate) AS rate_avg FROM afe_app LEFT JOIN afe_review ON app_id = review_app WHERE app_moderated = \"1\"";
	if(isset($_POST['os'])) {
		if($_POST['os'] != "all") {
			$sql = $sql . " AND ";
			$sql = $sql . "app_os = \"" . $_POST['os'] . "\"";
		}
	}
	if(isset($_POST['price'])) {
		if($_POST['price'] != "all") {
			$sql = $sql . " AND ";
			$sql = $sql . "app_price <= " . $_POST['price'];
		}
	}
	if(isset($_POST['category'])) {
		if($_POST['category'] != "all") {
			$sql = $sql . " AND ";
			$sql = $sql . "app_category = \"" . $_POST['category'] . "\"";
		}
	}
	if(isset($_POST['search'])) {
		if($_POST['search'] != "") {
			$sql = $sql . " AND (";
			// COMPARER LES STRING EN FULL MINUSCULE !!!
			$sql = $sql . "app_name like \"%" . $_POST['search'] . "%\" OR ";
			$sql = $sql . "app_company like \"%" . $_POST['search'] . "%\" OR ";
			$sql = $sql . "app_description like \"%" . $_POST['search'] . "%\")";
		}
	}
	$sql = $sql . " GROUP BY app_id";
	if(isset($_POST['rate'])) {
		if($_POST['rate'] != "all") {
			$sql = $sql . " HAVING rate_avg >= " . $_POST['rate'];
		}
	}
	$result = mysql_query($sql);

	// Application Display
	print "<div class = \"table\">";
	$i = 0;
	$divClosed = 1;
	while($db_field = mysql_fetch_assoc($result)) {
		if ($i == 0) {
			print "<div class = \"row\">";
			$divClosed = 0;
		}
		displayApp($db_field);
		$i ++;
		if ($i == 3) {
			print "</div>";
			$divClosed = 1;
			$i = 0;
		}
	}
	if ($divClosed == 0) {
		print "</div>";
		$divClosed = 1;
		$i = 0;
	}
	print "</div>";
		// AU dessus de la page ... some great app to start with (grosse image clickable)
		// Champ de recherche Category / Release Date / Customer Rating / Price / Device / Reset Filters
		// New / What's Hot / Release Date
	mysql_close();
?>
