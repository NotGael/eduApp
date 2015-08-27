<html>
<head>
	<title>Test</title>
	<CFTRANSACTION>
		<CFQUERY NAME = "test" DATASOURCE = "sql1304883">
			SELECT * FROM afe_user
		</CFQUERY>
	</CFTRANSACTION>
</head>
<body>
	<h1> Name list </h1>
	<CFOUTPUT QUERY = "test">#login#, #password#, #email# <br></CFOUTPUT>
</body>
</html>