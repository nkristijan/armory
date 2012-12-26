<html>
	<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="armory.css">
	<title>Oružarstvo - Oprema</title>
	</head>
	
	<body>
		<div id="global">
		<div id="header" style="height:180px;">
			<label id="header-text">Oružarstvo</label>
			<?php
				echo "<div id=\"login-box\">";
				echo "<form action=\"scripts/login.php\" method=\"post\">";
				echo "<table class=\"table-form\"><tr>
					  	<td>Korisničko ime: </td><td><input type=\"text\" name=\"username\"/></td>
						</tr><tr>
					  	<td>Zaporka: </td><td><input type=\"password\" name=\"password\"/></td>
						</tr><tr>
					  	<td colspan=2 style=\"text-align:right;\"><input type =\"submit\" value=\"Potvrdi\" ></td>
						</tr>
						";
				echo "</form>";
				
				echo "</div>";
			?>
		</div>
		</div>
	</body>

</html>