<?php
include 'scripts/admin_login.php'; 
$title = "Novi korisnik";
include 'html/html_top.php'; 
?>

	<?php
		echo "<div id=\"d-edit-member\">";
		echo "<form action=\"scripts/new_member.php\" method=\"post\">";
		
		echo "<table><table class=\"table-form\"><tr>
				<td>Ime: </td><td><input type=\"text\" name=\"firstname\" /></td>
				</tr><tr>
				<td>Prezime: </td><td><input type=\"text\" name=\"lastname\" /></td>
				</tr><tr>
				<td>Username: </td><td><input type=\"text\" name=\"username\" /></td>
				</tr><tr>
				<td>E-mail: </td><td><input type=\"text\" name=\"email\" /></td>
				</tr><tr>
				<td>Mobitel: </td><td><input type=\"text\" name=\"phonenum\" /></td>
				</tr><tr>
				<td colspan=2 style=\"text-align:right;\"><input type =\"submit\" value=\"Spremi\" ></td>
				</tr></table>";
		
		echo "</form></div>";	
		
// 		echo "<span class=\"field-name\">Ime: </span> <input type=\"text\" name=\"firstname\"/><br>";
// 		echo "<span class=\"field-name\">Prezime: </span> <input type=\"text\" name=\"lastname\" /><br>";
// 		echo "<span class=\"field-name\">Username: </span> <input type=\"text\" name=\"username\" /><br>";
// 		echo "<span class=\"field-name\">E-mail: </span> <input type=\"text\" name=\"email\" /><br>";
// 		echo "<span class=\"field-name\">Mobitel: </span> <input type=\"text\" name=\"phonenum\" /><br>";
// 		echo "<input type=\"submit\" value=\"Spremi\"/>";
	?>

<?php include 'html/html_bot.php'?>