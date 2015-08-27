<html>
	<head>
		<title>Review moderation</title>
	</head>
	<body>
		<CFIF isDefined('Session.login')>
			<CFIF isDefined('Form.submit')>
				<CFSET #first# = 0>
				<CFSET #reviewNb# = #Form.reviewNb# - 1>
				<CFLOOP FROM = "0" TO = "#reviewNb#" INDEX = "i" STEP = "1">
					<CFIF isDefined('Form.userReview#i#')>
						<CFIF Compare(Form.operation, "delete") eq 0>
							<CFIF #first# eq 0>
								<CFSET #first# = 1>
								<CFSET #query# = "DELETE FROM afe_review WHERE (review_user, review_app) IN (">
								<CFSET query = query & "(" & Form["userReview#i#"] & ", " & Form["appReview#i#"] & ")">
							<CFELSE>
								<CFSET query = query & " ,(" & Form["userReview#i#"] & ", " & Form["appReview#i#"] & ")">
							</CFIF>
						<CFELSE>
							<CFIF #first# eq 0>
								<CFSET #first# = 1>
								<CFSET query = "UPDATE afe_review SET review_moderated = 1 WHERE (review_user, review_app) IN (">
								<CFSET query = query & "(" & Form["userReview#i#"] & ", " & Form["appReview#i#"] & ")">
							<CFELSE>
								<CFSET query = query & " ,(" & Form["userReview#i#"] & ", " & Form["appReview#i#"] & ")">
							</CFIF>
						</CFIF>
					</CFIF>
				</CFLOOP>
				<CFIF #first# eq 1>
					<CFSET query = query & ")">
					<CFOUTPUT>
						#query#
					</CFOUTPUT>
					<CFTRANSACTION>
						<CFQUERY NAME = "moderateReview" DATASOURCE = "********">
							#query#
						</CFQUERY>
					</CFTRANSACTION>
				</CFIF>
			</CFIF>
		</CFIF>
	</body>
</html>
