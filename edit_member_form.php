<?php
$title = "Oružarstvo - Izmijeni korisnika";
?>

	<?php

		session_start();
		if(!$_SESSION['logon']) {
			header("Location: error_pages/access_denied.html");
			die();
		}
		else if ($_SESSION['user'] == 0){
			include 'html/user_html_top.php';
			$data = getUserData($_SESSION['userId']);
		}
		else if ($_SESSION['user'] == 1){
			
			if(isset($_GET["id"])){
				include 'html/administration_html_top.php';
				$data = getUserData($_GET["id"]);}
			else {
				include 'html/user_html_top.php';
				$data = getUserData($_SESSION['userId']);
			} 
		}
			
		
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
		
		
		echo "</form></div>";		
	?>
		
<?php include 'html/html_bot.php'?>