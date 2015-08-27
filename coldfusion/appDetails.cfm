<html>
	<head>
		<title>Application details</title>
	</head>
	<body>
		<CFIF isDefined('Form.submit')>
			<CFLOOP FROM = "0" TO = "#appNb#" INDEX = "i" STEP = "1">
				<OUTPUT>
					#i#
				</OUTPUT>
			</CFLOOP>
		</CFIF>
	</body>
</html>