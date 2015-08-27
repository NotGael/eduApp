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
		<?php
		// Database Connection
		if(isset($_GET['app_id'])) {
			$con = mysql_connect("********", "********", "********"); 
			@mysql_select_db("********") or die("Unable to select database");
			$sql = "SELECT afe_app.*, AVG(review_rate) AS rate_avg FROM afe_app LEFT JOIN afe_review ON app_id = review_app";
			$sql = $sql . " WHERE app_id = " . $_GET['app_id'];
			$result = mysql_query($sql);
			$sql2 = "SELECT afe_review.* FROM afe_app LEFT JOIN afe_review ON app_id = review_app WHERE app_id = " . $_GET['app_id'];
			$result2 = mysql_query($sql2);
			$fail = 0;
		}
		?>
		<div class="page">
			<?php
				include 'navBar.php';
			?>
			<div>
				<?php
					if(isset($_GET['app_id'])) {
						$db_field = mysql_fetch_assoc($result);
						if($db_field['app_moderated'] == 1) {
							print "<div class = \"col1\"><img class = \"applicationPicture\" src = \"" . $db_field['app_picture'] . "\" alt = \"appPicture\">";
							print "<div class = \"applicationInfo\"><p class = \"infoData\">";
							print $db_field['app_company'] . "<br />";
							print $db_field['app_os'] . "<br />";
							print $db_field['app_version'] . "<br />";
							print $db_field['app_category'] . "<br />";
							print $db_field['app_releaseDate'] . "<br />";
							$i = 1;
							while($i <= $db_field['rate_avg']) {
								print "<img src = \"../images/star_full.png\" alt = \"starFull\">";
								$i++;
							}
							while($i <= 5) {
								print "<img src = \"../images/star_empty.png\" alt = \"starEmpty\">";
								$i++;
							}
							print "</p></div></div>";
							print "<div class = \"col2\"><h1 class = \"applicationTitle\">" . $db_field['app_name'] . "</h1>";
							print "<p class = \"applicationPrice\">" . $db_field['app_price'] . " $<p>";
							print "<div class = \"applicationDescr\"><p>";
							print $db_field['app_description'];
							print "</p></div></div>";
							print "<div class = \"screenshot\"><img src = \"" . $db_field['app_screenshot'] . "\" alt = \"appScreenshot\"></div>";
						}
						else {
							print "Sorry, this application doesn't exist or has not been validated yet.";
							$fail = 1;
						}
					}
				?>
			</div>
			<?php
				if($fail == 0) {
			?>
			<div class = "review" action = "comment.php" method = "post">
				<h2 class = "reviewTitle">Post a review:</h2>
				<?php
					if(!isset($_SESSION['id'])) {
						print "<p class = \"reviewTitle\">You have to be logged in to submit a review.</p>";
					}
				?>
				<form class = "reviewForm" action = "review.php" method = "post">

					<?php
						if(isset($_SESSION['id'])) {
							$sql3 = "SELECT review_rate, review_comment FROM afe_review WHERE review_app = \"" . $_GET['app_id'] . "\" AND  review_user = \"" . $_SESSION['id'] . "\"";
					  		$result3 = mysql_query($sql3);
							$db_field3 = mysql_fetch_assoc($result3);
							if(!$db_field3) {
								print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
								print "<option selected value = \"0\">0</option>";
								print "<option value = \"1\">1</option>";
								print "<option value = \"2\">2</option>";
								print "<option value = \"3\">3</option>";
								print "<option value = \"4\">4</option>";
								print "<option value = \"5\">5</option>";
								print "</select>";
							}
							else {
								switch($db_field3['review_rate']) {
									case 0:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option selected value = \"0\">0</option>";
										print "<option value = \"1\">1</option>";
										print "<option value = \"2\">2</option>";
										print "<option value = \"3\">3</option>";
										print "<option value = \"4\">4</option>";
										print "<option value = \"5\">5</option>";
										print "</select>";
										break;
									case 1:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option value = \"0\">0</option>";
										print "<option selected value = \"1\">1</option>";
										print "<option value = \"2\">2</option>";
										print "<option value = \"3\">3</option>";
										print "<option value = \"4\">4</option>";
										print "<option value = \"5\">5</option>";
										print "</select>";
										break;
									case 2:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option value = \"0\">0</option>";
										print "<option value = \"1\">1</option>";
										print "<option selected value = \"2\">2</option>";
										print "<option value = \"3\">3</option>";
										print "<option value = \"4\">4</option>";
										print "<option value = \"5\">5</option>";
										print "</select>";
										break;
									case 3:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option value = \"0\">0</option>";
										print "<option value = \"1\">1</option>";
										print "<option value = \"2\">2</option>";
										print "<option selected value = \"3\">3</option>";
										print "<option value = \"4\">4</option>";
										print "<option value = \"5\">5</option>";
										print "</select>";
										break;
									case 4:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option value = \"0\">0</option>";
										print "<option value = \"1\">1</option>";
										print "<option value = \"2\">2</option>";
										print "<option value = \"3\">3</option>";
										print "<option selected value = \"4\">4</option>";
										print "<option value = \"5\">5</option>";
										print "</select>";
										break;
									case 5:
										print "Rate: <select class = \"reviewRate\" name = \"rate\" required>";
										print "<option value = \"0\">0</option>";
										print "<option value = \"1\">1</option>";
										print "<option value = \"2\">2</option>";
										print "<option value = \"3\">3</option>";
										print "<option value = \"4\">4</option>";
										print "<option selected value = \"5\">5</option>";
										print "</select>";
										break;
								}
							}
						}
						else {
							print "Rate: <select class = \"reviewRate\" name = \"rate\" required disabled>";
							print "<option selected value = \"0\">0</option>";
							print "<option value = \"1\">1</option>";
							print "<option value = \"2\">2</option>";
							print "<option value = \"3\">3</option>";
							print "<option value = \"4\">4</option>";
							print "<option value = \"5\">5</option>";
							print "</select>";
						}
					?>
					<br />
					<?php
						if(isset($_SESSION['id'])) {
								print "<textarea class = \"reviewComment\" name = \"comment\" rows=\"10\" cols=\"100\" maxlength =\"250\" required>";
								if($db_field3) {
									print $db_field3['review_comment'];
								}
								print "</textarea>";

						}
						else {
							print "<textarea class = \"reviewComment\" name = \"comment\" rows=\"10\" cols=\"100\" maxlength =\"250\" required disabled></textarea>";
						}
					?>
					<br />
					<?php
						if(isset($_SESSION['id'])) {
							print "<input class = \"reviewSubmit\" type = \"hidden\" name = \"user\" value = \"" . $id ."\">";
							print "<input class = \"reviewSubmit\" type = \"hidden\" name = \"app\" value = \"" . $_GET['app_id'] ."\">";
							if(!$db_field3) {
								print "<input class = \"reviewSubmit\" type = \"hidden\" name = \"pastReview\" value = \"0\">";
							}
							else {
								print "<input class = \"reviewSubmit\" type = \"hidden\" name = \"pastReview\" value = \"1\">";
							}
							print "<input class = \"reviewSubmit\" type = \"submit\" value = \"Post\" alt = \"reviewSubmit\">";
						}
						else {
							print "<input class = \"reviewSubmit\" type = \"submit\" value = \"Post\" alt = \"reviewSubmit\" disabled>";
						}
					?>

				</form>
			</div>
			<div class = "userReviewList">
				<h2 class = "reviewTitle">Review from other user:</h2>
				<?php
					while($db_field2 = mysql_fetch_assoc($result2)) {
						if($db_field2['review_moderated'] == 1) {
							$sql4 = "SELECT user_login FROM afe_user WHERE user_id = \"" . $db_field2['review_user'] . "\"";
							$result4 = mysql_query($sql4);
							$db_field4 = mysql_fetch_assoc($result4);
							if($db_field4) {
								print "<div class = \"userReview\"><p>";
								print $db_field4['user_login'] . " - ";
								$i = 0;
								while($i < $db_field2['review_rate']) {
									print "<img src = \"../images/star_full.png\" alt = \"starFull\">";
									$i++;
								}
								while($i < 5) {
									print "<img src = \"../images/star_empty.png\" alt = \"starEmpty\">";
									$i++;
								}
								print "<p class = \"commentReview\">" . $db_field2['review_comment'] . "</p>";
								print $db_field2['review_date'];
								print "</p></div>";
							}
						}
					}
				?>
			</div>
			<?php
			}
				include 'footer.php';
				mysql_close();
			?>
		</div>
	</body>
</html>
