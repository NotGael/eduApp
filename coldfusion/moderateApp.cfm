<html>
	<head>
		<title>Application moderation</title>
	</head>
	<body>
		<CFIF isDefined('Session.login')>
			<CFIF isDefined('Form.submit')>
				<CFSET #first# = 0>
				<CFSET #appNb# = #Form.appNb# - 1>
				<CFLOOP FROM = "0" TO = "#appNb#" INDEX = "i" STEP = "1">
					<CFIF isDefined('Form.app#i#')>
						<CFIF Compare(Form.operation, "delete") eq 0>
							<CFIF #first# eq 0>
								<CFSET #first# = 1>
								<CFSET #query# = "DELETE FROM afe_app WHERE app_id IN (">
								<CFSET query = query & Form["app#i#"]>
							<CFELSE>
								<CFSET query = query & "," & Form["app#i#"]>
							</CFIF>
						<CFELSE>
							<CFIF #first# eq 0>
								<CFSET #first# = 1>
								<CFSET query = "UPDATE afe_app SET app_moderated = 1 WHERE app_id IN (">
								<CFSET query = query & Form["app#i#"]>
							<CFELSE>
								<CFSET query = query & "," & Form["app#i#"]>
							</CFIF>
						</CFIF>
					</CFIF>
				</CFLOOP>
				<CFIF #first# eq 1>
					<CFSET query = query & ")">
					<CFTRANSACTION>
						<CFQUERY NAME = "moderateApp" DATASOURCE = "********">
							#query#
						</CFQUERY>
					</CFTRANSACTION>
				</CFIF>
			</CFIF>
		</CFIF>
	</body>
</html>
