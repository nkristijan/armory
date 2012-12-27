<?php
include 'scripts/admin_login.php'; 
$title = "Novi predmet";
include 'html/administration_html_top.php'; 
?>

	<?php
		echo "<div id=\"d-edit-member\">";
		echo "<form action=\"scripts/new_item.php\" method=\"post\">";
		
		echo "<table><table class=\"table-form\"><tr>
				<td>Tip: </td><td><input type=\"text\" name=\"type\"/></td>
				</tr><tr>
				<td>Proizvođać: </td><td><input type=\"text\" name=\"brand\"/></td>
				</tr><tr>
				<td>Model: </td><td><input type=\"text\" name=\"model\"/></td>
				</tr><tr>
				<td>Boja: </td><td><input type=\"text\" name=\"color\"/></td>
				</tr><tr>
				<td>Sezona: </td><td><input type=\"radio\" name=\"season\" value=\"ljeto\"/>Ljeto<input type=\"radio\" name=\"season\" value=\"zima\"/>Zima</td>
				</tr><tr>
				<td>Količina: </td><td><input type=\"text\" name=\"quantity\"/></td>
				</tr><tr>
				<td>Opis: </td><td><input type=\"text\" name=\"description\"/></td>
				</tr><tr>
				<td colspan=2 style=\"text-align:right;\"><input type =\"submit\" value=\"Spremi\" ></td>
				</tr></table>";
		
		echo "</form></div>";
		
	?>
		
<?php include 'html/html_bot.php'?>