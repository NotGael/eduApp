<html>
	<head>
    	<meta charset="utf-8">
    	<title>Moderate review</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<CFIF isDefined('Session.login')>
			<CFTRANSACTION>
				<CFQUERY NAME = "reviewList" DATASOURCE = "********">
					SELECT afe_review.* , DATE_FORMAT(review_date, '%d/%m/%Y') as releaseDate, user_login, app_name
					FROM afe_review
					JOIN afe_user ON review_user = user_id
					JOIN afe_app ON review_app = app_id
					WHERE review_moderated = 0
					ORDER BY review_date
				</CFQUERY>
			</CFTRANSACTION>
				<CFIF reviewList.recordcount GT 0>
					<CFSET reviewNb = 0>
					<CFOUTPUT>
						<form action = "moderateReview.cfm" method = "post">
							<table>
								<tr>
									<th>Select</th>
									<th>User</th>
									<th>Application</th>
									<th>Rate</th>
									<th>Comment</th>
									<th>Release Date</th>
								</tr>
					</CFOUTPUT>
					<CFOUTPUT QUERY = "reviewList">
							<tr>
								<td>
									<input type = "checkbox" name = "userReview#reviewNb#" value = "#review_user#">
									<input type = "hidden" name = "appReview#reviewNb#" value = "#review_app#">
								</td>
								<td>#user_login#</td>
								<td>#app_name#</td>
								<td>#review_rate#</td>
								<td>#review_comment#</td>
								<td>#releaseDate#</td>
								<CFSET reviewNb = reviewNb + 1>
							</tr>
					</CFOUTPUT>
					<CFOUTPUT>
							</table>
							<input type = "hidden" name = "reviewNb" value = "#reviewNb#">
							<select name = "operation">
								<option selected value = "validate">Validate</option>
								<option value = "delete">Delete</option>
							</select><br />
							<input type = "submit" name = "submit" value = "Submit">
						</form>
					</CFOUTPUT>
				<CFELSE>
					<CFOUTPUT>
						No review to moderated!
					</CFOUTPUT>
				</CFIF>
		<CFELSE>
			WRONG PASSWORD!
		</CFIF>
	</body>
</html>
