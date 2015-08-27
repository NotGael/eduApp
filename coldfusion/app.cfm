<html>
	<head>
    	<meta charset="utf-8">
    	<title>Moderate application</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<CFIF isDefined('Session.login')>
			<CFTRANSACTION>
				<CFQUERY NAME = "appList" DATASOURCE = "********">
					SELECT afe_app.* , DATE_FORMAT(app_releaseDate, '%d/%m/%Y') as releaseDate, user_login
					FROM afe_app JOIN afe_user ON app_user = user_id
					WHERE app_moderated = 0
					ORDER BY app_releaseDate
				</CFQUERY>
			</CFTRANSACTION>
				<CFIF appList.recordcount GT 0>
					<CFSET appNb = 0>
					<CFOUTPUT>
						<form action = "moderateApp.cfm" method = "post">
							<table>
								<tr>
									<th>Select</th>
									<th>ID</th>
									<th>Name</th>
									<th>Release Date</th>
									<th>OS</th>
									<th>Version</th>
									<th>Category</th>
									<th>Price</th>
									<th>User</th>
									<th>Details</th>
								</tr>
					</CFOUTPUT>
					<CFOUTPUT QUERY = "appList">
							<tr>
								<td><input type = "checkbox" name = "app#appNb#" value = "#app_id#"></td>
								<td>#app_id#</td>
								<td>#app_name#</td>
								<td>#releaseDate#</td>
								<td>#app_os#</td>
								<td>#app_version#</td>
								<td>#app_category#</td>
								<td> #app_price#</td>
								<td>#user_login#</td>
								<td><a href = "appDetails.cfm?app_id=#app_id#">Details</a></td>
								<CFSET appNb = appNb + 1>
							</tr>
					</CFOUTPUT>
					<CFOUTPUT>
							</table>
							<input type = "hidden" name = "appNb" value = "#appNb#">
							<select name = "operation">
								<option selected value = "validate">Validate</option>
								<option value = "delete">Delete</option>
							</select><br />
							<input type = "submit" name = "submit" value = "Submit">
						</form>
					</CFOUTPUT>
				<CFELSE>
					<CFOUTPUT>
						No application to moderated!
					</CFOUTPUT>
				</CFIF>
		<CFELSE>
			WRONG PASSWORD!
		</CFIF>
	</body>
</html>
