<?php
	session_start();
	$id = $_SESSION['id'];
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	
	// CHANGER LE LIEN VERS L INDEX DANS NAVBAR QUAND ON LE METTRA A VRAI INDEX DE MON REPERTOIRE 

	// Empecher les app non moderée de s'afficher sur application.php revoyer une erreur si app non existante ou non modérée
	
	// LIEN VERS APPSTORE OFFI : AJOUT DU CHAMP DANS LA BD OU PAS LES GENS SONT ASSEZ INTELLIGENT POUR ALLER SUR LE STORE DE LE SMARTPHONE ?
	
	// ajout du lien add an app (la grosse banderole clickable de l'index)

	// APPLICATION SUBMIT PAGE DESIGN

	// PROFIL PAGE -> WHISHIST SUPPRESSION -> ADD TO WISH LIST ICON ON APP DESCRIPTION PAGE
	// ADD / DELETE OR SEARCH FRIENDS AND SEE FRIENDS WISHLIST

	// TESTER TOUT AVEC LONGEUR DE CHAMP DE TEXTE MAXIMUM

	// QUAND ON FAIT UNE RECHERCHE PAR RATE CELLE QUI ON AUCUNE REVIEW APPARAISSE PAS !
	
	// SUBMIT NEW APP AJOUTER CHAMP app_user
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<title>Apps for Education</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<div class="page">
			<?php
				include 'php/navBar.php';
			?>
			<div class = "logo">
				<img src = "http://dummyimage.com/1024x200/000/fff" alt = "Application Logo">
			</div>
			<div class = "application">
				
				<!-- C'est ici qu'on fait la barre de recherche et tout le site en fait :p -->
				
				<form class = "searchBar" action = "index.php" method = "post">
					<p class = "searchText">OS:</p>
					<select class = "searchSelect" name = "os">
						<?php
							if(isset($_POST['os'])) {
								switch($_POST['os']) {
									case "all":
										print "<option selected value = \"all\">All</option>";
										print "<option value = \"android\">Android</option>";
										print "<option value = \"ios\">iOS</option>";
										print "<option value = \"windows\">Windows Phone</option>";
										break;
									case "android":
										print "<option value = \"all\">All</option>";
										print "<option selected value = \"android\">Android</option>";
										print "<option value = \"ios\">iOS</option>";
										print "<option value = \"windows\">Windows Phone</option>";
										break;
									case "ios":
										print "<option value = \"all\">All</option>";
										print "<option value = \"android\">Android</option>";
										print "<option selected value = \"ios\">iOS</option>";
										print "<option value = \"windows\">Windows Phone</option>";
										break;
									case "windows":
										print "<option value = \"all\">All</option>";
										print "<option value = \"android\">Android</option>";
										print "<option value = \"ios\">iOS</option>";
										print "<option selected value = \"windows\">Windows Phone</option>";
										break;
								}
							}
							else {
								print "<option selected value = \"all\">All</option>";
								print "<option value = \"android\">Android</option>";
								print "<option value = \"ios\">iOS</option>";
								print "<option value = \"windows\">Windows Phone</option>";
							}
						?>
					</select>
					<p class = "searchText">Price:</p>
					<select class = "searchSelect" name = "price">
						<?php
							if(isset($_POST['price'])) {
								switch($_POST['price']) {
									case "all":
										print "<option selected value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "0.00":
										print "<option value = \"all\">All</option>";
										print "<option selected value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "0.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option selected value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "4.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option selected value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "9.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option selected value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "19.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option selected value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "49.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option selected value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									case "99.99":
										print "<option value = \"all\">All</option>";
										print "<option value = \"0.00\">Free</option>";
										print "<option value = \"0.99\">&lt;= 0.99 $</option>";
										print "<option value = \"4.99\">&lt;= 4.99 $</option>";
										print "<option value = \"9.99\">&lt;= 9.99 $</option>";
										print "<option value = \"19.99\">&lt;= 19.99 $</option>";
										print "<option value = \"49.99\">&lt;= 49.99 $</option>";
										print "<option selected value = \"99.99\">&lt;= 99.99 $</option>";
										break;
									}
								}
								else {
									print "<option selected value = \"all\">All</option>";
									print "<option value = \"0.00\">Free</option>";
									print "<option value = \"0.99\">&lt;= 0.99 $</option>";
									print "<option value = \"4.99\">&lt;= 4.99 $</option>";
									print "<option value = \"9.99\">&lt;= 9.99 $</option>";
									print "<option value = \"19.99\">&lt;= 19.99 $</option>";
									print "<option value = \"49.99\">&lt;= 49.99 $</option>";
									print "<option value = \"99.99\">&lt;= 99.99 $</option>";
								}
							?>
					</select>
					<p class = "searchText">Category:</p>
					<select class = "searchSelect" name = "category">
						<?php
							if(isset($_POST['category'])) {
								switch($_POST['category']) {
									case "all":
										print "<option selected value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
								  	case "biology":
										print "<option value = \"all\">All</option>";
										print "<option selected value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "chimistry":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option selected value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "informatic":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option selected value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "language":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option selected value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "law":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option selected value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "mathematics":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option selected value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "medecine":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option selected value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;
									case "physics":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option selected value = \"physics\">Physics</option>";
										print "<option value = \"productivity\">Productivity</option>";
										break;	
									case "productivity":
										print "<option value = \"all\">All</option>";
										print "<option value = \"biology\">Biology</option>";
										print "<option value = \"chimistry\">Chimistry</option>";
										print "<option value = \"informatic\">Informatic</option>";
										print "<option value = \"language\">Language</option>";
										print "<option value = \"law\">Law</option>";
										print "<option value = \"mathematics\">Mathematics</option>";
										print "<option value = \"medecine\">Medecine</option>";
										print "<option value = \"physics\">Physics</option>";
										print "<option selected value = \"productivity\">Productivity</option>";
										break;	
								}
							}
							else {
								print "<option selected value = \"all\">All</option>";
								print "<option value = \"biology\">Biology</option>";
								print "<option value = \"chimistry\">Chimistry</option>";
								print "<option value = \"informatic\">Informatic</option>";
								print "<option value = \"language\">Language</option>";
								print "<option value = \"law\">Law</option>";
								print "<option value = \"mathematics\">Mathematics</option>";
								print "<option value = \"medecine\">Medecine</option>";
								print "<option value = \"physics\">Physics</option>";
								print "<option value = \"productivity\">Productivity</option>";
							}
						?>
					</select>
					<p class = "searchText">Rate:</p>
					<select class = "searchSelect" name = "rate">
						<?php
							if(isset($_POST['rate'])) {
								switch($_POST['rate']) {
									case "all":
										print "<option selected value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "5":
										print "<option value = \"all\">All</option>";
										print "<option selected value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "4":
										print "<option value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option selected value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "3":
										print "<option value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option selected value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "2":
										print "<option value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option selected value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "1":
										print "<option value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option selected value = \"1\">&gt;= 1</option>";
										print "<option value = \"0\">&gt;= 0</option>";
										break;
									case "0":
										print "<option value = \"all\">All</option>";
										print "<option value = \"5\">= 5</option>";
										print "<option value = \"4\">&gt;= 4</option>";
										print "<option value = \"3\">&gt;= 3</option>";
										print "<option value = \"2\">&gt;= 2</option>";
										print "<option value = \"1\">&gt;= 1</option>";
										print "<option selected value = \"0\">&gt;= 0</option>";
										break;
									
								}
							}
							else {
								print "<option selected value = \"all\">All</option>";
								print "<option value = \"5\">= 5</option>";
								print "<option value = \"4\">&gt;= 4</option>";
								print "<option value = \"3\">&gt;= 3</option>";
								print "<option value = \"2\">&gt;= 2</option>";
								print "<option value = \"1\">&gt;= 1</option>";
								print "<option value = \"0\">&gt;= 0</option>";
							}
						?>
					</select>
					<p class = "searchText">Search:</p>
					<?php
						print "<input class = \"searchInput\" type = \"text\" name = \"search\" alt = \"search\"";
						if(isset($_POST['search'])) {
							print " value = \"";
							print $_POST['search'];
							print "\">";
						}
						else { 
							print ">";
						}
					?>
					<input class = "searchSubmit" type = "submit" value = "Find" alt = "searchSubmit">
				</form>
				<div class = "information">
					<span class = "appTitleGreen">Android</span> - 
					<span class = "appTitleRed">iOS</span> - 
					<span class = "appTitleViolet">Windows</span>
				</div>
				<?php
					include 'php/displayAppList.php';
				?>
			</div>
			<?php
				include 'php/footer.php';
			?>
		</div>
	</body>
</html>