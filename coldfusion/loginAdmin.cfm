<html>
<head>
	<title>Book Display</title>
	<CFTRANSACTION>
		<CFQUERY NAME = "loginAdmin" DATASOURCE = "********">
			SELECT *
			FROM user
			WHERE password = '#Form.passsword#' AND login = '#Form.login#'
		</CFQUERY>
	</CFTRANSACTION>
</head>
<body>
	<h1> Name list </h1>
	<CFOUTPUT QUERY = "loginAdmin">#login#, #password# <br /></CFOUTPUT>
</body>
</html>
