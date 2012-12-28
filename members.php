<?php
include 'scripts/admin_login.php'; 
$title = "Članovi";
include 'html/administration_html_top.php'; 
?>

	<?php
		include 'scripts\db_con.php';
		
		echo "<div id=\"content-header1\">
			  <a href=\"new_member_form.php\"><input type=\"button\" class=\"button1\" value=\"Novi korisnik\"></a>
			  </div>";
		
		$result =  mysql_query("SELECT * FROM members ORDER BY first_name", $con);
		
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:110px;\">Ime</td>
		<td style=\"width:110px;\">Prezime</td>
		<td style=\"width:110px;\">Username</td>
		<td style=\"width:180px;\">e-mail</td>
		<td style=\"width:130px;\">Mobitel</td>
		<td style=\"width:80px;\">Aktivan</td>
		<td style=\"width:80px;\">Editiraj</td></tr>";
		
		for($i = 0; $row = mysql_fetch_array($result); $i++){
			if($i%2==0) echo "<tr class=\"row1\">";
			else echo "<tr class=\"row0\">";
			
			echo "<td>" . $row['first_name'] . "</td>";
			echo "<td>" . $row['last_name'] . "</td>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['phone_number'] . "</td>";
			echo "<td>" . accountActive($row['account_active']) . "</td>";
			echo "<td><a href=\"edit_member_form.php?id=" . $row['m_id'] ."\">Editiraj ></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>

<?php include 'html/html_bot.php'?>