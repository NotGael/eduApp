<html>
	<head>
		<title>Administration Login</title>
	</head>
	<body>
		<CFIF isDefined('Form.login')>
			<CFTRANSACTION>
				<CFQUERY NAME = "loginAdmin" DATASOURCE = "********">
					SELECT *
					FROM afe_user
					WHERE user_login = '#Form.login#' AND user_password = '#Form.password#' AND user_admin = 1
				</CFQUERY>
			</CFTRANSACTION>
			<CFIF loginAdmin.recordcount eq 1>
				<CFOUTPUT QUERY = "loginAdmin">#user_login#, #user_password#, #user_admin#, #user_id#<br />
					<CFSET Session.login = #user_id#>
					Session Login : #Session.login#<br />
					<a href = "review.cfm">Moderate review</a><br />
					<a href = "app.cfm">Moderate app</a>
				</CFOUTPUT>
			<CFELSE>
				WRONG PASSWORD!
			</CFIF>
		<CFELSE>
			<h1> Administration Login</h1>
			<form action="admin.cfm" method="post">
				Login: <input type="text" name="login">
				Password: <input type="password" name="password">
				<input type="submit" value="Log In">
			</form>
		</CFIF>
	</body>
</html>
