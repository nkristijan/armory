<?php
include 'scripts/admin_login.php'; 
$title = "Oružarstvo - Izmijeni korisnika";
include 'html/administration_html_top.php'; 
?>

	<?php	
		include 'scripts/armory_utils.php';
		$data = getUserData($_GET["id"]);
		
		echo "<div id=\"d-edit-member\">";
		echo "<form action=\"scripts/edit_member.php\" method=\"post\">";
		
		echo "<table><table class=\"table-form\"><tr>
				<td>Ime: </td><td><input type=\"text\" value=\"" . $data['first_name'] . "\" name=\"firstname\" /><input type=\"text\" value=\"" . $data['m_id'] . "\" name=\"id\" hidden /></td>
				</tr><tr>
				<td>Prezime: </td><td><input type=\"text\" value=\"" . $data['last_name'] . "\" name=\"lastname\" /></td>
				</tr><tr>
				<td>Username: </td><td><input type=\"text\" value=\"" . $data['username'] . "\" name=\"username\" /></td>
				</tr><tr>
				<td>E-mail: </td><td><input type=\"text\" value=\"" . $data['email'] . "\" name=\"email\" /></td>
				</tr><tr>
				<td>Mobitel: </td><td><input type=\"text\" value=\"" . $data['phone_number'] . "\" name=\"phonenum\" /></td>
				</tr><tr>
				<td colspan=2 style=\"text-align:right;\"><input type =\"submit\" value=\"Spremi\" ></td>
				</tr></table>";
		
		
// 		echo "<form action=\"scripts/edit_member.php\" method=\"post\">";
// 		echo "<input type=\"text\" value=\"" . $data['m_id'] . "\" name=\"id\" hidden /><br>";
// 		echo "<span class=\"field-name\">Ime: </span> <input type=\"text\" value=\"" . $data['first_name'] . "\" name=\"firstname\" /><br>";
// 		echo "<span class=\"field-name\">Prezime: </span> <input type=\"text\" value=\"" . $data['last_name'] . "\" name=\"lastname\" /><br>";
// 		echo "<span class=\"field-name\">Username: </span> <input type=\"text\" value=\"" . $data['username'] . "\" name=\"username\" /><br>";
// 		echo "<span class=\"field-name\">E-mail: </span> <input type=\"text\" value=\"" . $data['email'] . "\" name=\"email\" /><br>";
// 		echo "<span class=\"field-name\">Mobitel: </span> <input type=\"text\" value=\"" . $data['phone_number'] . "\" name=\"phonenum\" /><br>";
// 		echo "<input type=\"submit\" value=\"Spremi\"/>";
		
		
		echo "</form></div>";		
	?>
		
<?php include 'html/html_bot.php'?>