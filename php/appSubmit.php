<?php
	session_start();
	$id = $_SESSION['id'];
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Europe/London");
	$date = date('Y-m-d', time());
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
				<form action = "addApplication.php"  method = "post">
					Name: <input type = "text" name = "name" required><br />
					Company: <input type = "text" name = "company" required><br />
					OS: <select name = "os" required>
						<option value = "android">Android</option>
						<option value = "ios">iOS </option>
						<option value = "windows">Windows Phone</option>
					</select><br />
					Version: <input type = "text" name = "version" required><br />
					Category: <select name = "category" required>
						<option value = "biology">Biology</option>
						<option value = "chimistry">Chimistry</option>
						<option value = "informatic">Informatic</option>
						<option value = "language">Language</option>
						<option value = "law">Law</option>
						<option value = "mathematics">Mathematics</option>
						<option value = "medecine">Medecine</option>
						<option value = "physics">Physics</option>
						<option value = "productivity">Productivity</option>
					</select><br />
					Picture Link: <input type = "text" name = "picture" required><br />
					Description: <textarea name = "description" rows = "20" cols = "100" maxlength = "5000" required></textarea><br />
					Screenshot: <input type = "text" name = "screenshot" required><br />
					Price: <input type = "number" name = "price" min = "0.00" max = "999.99" step = "any" required><br />
					<?php
						print "<input type = \"hidden\" name = \"releaseDate\" value = \"" . $date . "\">";
					?>
					<input type = "submit" value = "Submit" alt = "appSubmit" required>
				</from>
			</div>
			<?php
				include 'footer.php';
				//mysql_close();
			?>
		</div>
	</body>
</html>