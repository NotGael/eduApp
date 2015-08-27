<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	print "<nav class=\"menuBar\"><div class=\"title\"><a class = \"indexLink\" href=\"http://mayar.abertay.ac.uk/~1304883/appforeducation/index.php\">Apps for Education</a></div>";
 	if(!$id) {
		print "<form class = \"loginForm\" action = \"http://mayar.abertay.ac.uk/~1304883/appforeducation/php/login.php\" method = \"post\">
			Login: <input class = \"textLoginForm\" type = \"text\" name = \"login\" alt = \"login\">
			Password: <input class = \"textLoginForm\" type = \"password\" name = \"password\" alt = \"password\">
			<input class = \"submitLoginForm\" type = \"submit\" value = \"Log In\" alt = \"logIn\">
		</form>";
		print "<form class = \"signUp\" action = \"http://mayar.abertay.ac.uk/~1304883/appforeducation/php/signup.php\">";
		print "	<input class = \"submitSignUp\" type = \"submit\" value = \"Sign Up\" alt = \"signUp\">";
		print "</form>";
	}
	else {
		print "<div class = \"helloUser\">";
		print "Hello, " . $_SESSION['login'];
		print "</div>";
		print "<form class = \"logOut\" action = \"http://mayar.abertay.ac.uk/~1304883/appforeducation/php/disconnect.php\">";
		print "	<input class = \"submitLogOut\" type = \"submit\" value = \"Log Out\" alt = \"logOut\">";
		print "</form>";
	}
	print "</nav>";
?>
