<?php
	session_start();
	$id = $_SESSION['id'];
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<title>Apps for Education</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../style.css" rel="stylesheet">
	</head>
	<body>
		<div class="page">
			<?php
				include 'navBar.php';
			?>
			<div>
				<?php
					$con = mysql_connect("********", "********", "********");
					@mysql_select_db("********") or die("Unable to select database");
					if (isset($_POST['name']) && isset($_POST['company']) && isset($_POST['os']) && isset($_POST['version']) && isset($_POST['category']) && isset($_POST['picture']) && isset($_POST['description']) && isset($_POST['screenshot']) && isset($_POST['price']) && isset($_POST['releaseDate'])) {
						$sqlApp = "INSERT INTO afe_app (app_name, app_description, app_picture, app_screenshot, app_releaseDate, app_category, app_os, app_version, app_company, app_price) VALUE (\"" . $_POST['name'] . "\", \"" . $_POST['description'] . "\", \"" . $_POST['picture'] . "\", \"" . $_POST['screenshot'] . "\", \"" . $_POST['releaseDate'] . "\", \"" . $_POST['category'] . "\", \"" .   $_POST['os'] . "\", \"" .  $_POST['version'] . "\", \"" . $_POST['company'] . "\", " . $_POST['price'] . ")";
  						$resultApp = mysql_query($sqlApp);
						//$db_fieldApp = mysql_fetch_assoc($resultApp);
    					if (!$resultApp) {
    						echo "Error - Try again!";
    					}
						else {
							echo "Succes!";
						}
					}
				?>
			</div>
			<?php
				include 'footer.php';
				mysql_close();
			?>
		</div>
	</body>
</html>
