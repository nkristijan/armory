<?php 
include 'scripts/admin_login.php'; 
$title = "Oprema";
include 'html/administration_html_top.php'; 
?>
			
	<?php
		include 'scripts\db_con.php';
		
		echo "<div id=\"content-header1\">
			  <a href=\"new_item_form.php\"><input type=\"button\" class=\"button1\"value=\"Novi predmet\"></a>
			  </div>";
		
		$result =  mysql_query("SELECT * FROM items ORDER BY type", $con);
		
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:90px;\">Tip</td>
		<td style=\"width:100px;\">Proizvođač</td>
		<td style=\"width:90px;\">Model</td>
		<td style=\"width:110px;\">Boja</td>
		<td style=\"width:70px;\">Sezona</td>
		<td style=\"width:70px;\">Dostupno</td>
		<td style=\"width:220px;\">Opis</td>
		<td style=\"width:50px;\">Posudi</td></tr>";
		
		for($i = 0; $row = mysql_fetch_array($result); $i++){
			echo "<form action=\"lend_list.php\" method=\"post\">";
			if($i%2==0) echo "<tr class=\"row1\">";
			else echo "<tr class=\"row0\">";
			
			echo "<td>" . $row['type'] . "</td>";
			echo "<td>" . $row['brand'] . "</td>";
			echo "<td>" . $row['model'] . "</td>";
			echo "<td>" . $row['color'] . "</td>";
			echo "<td>" . $row['season'] . "</td>";
			echo "<td>" . $row['available'] . "/" .$row['quantity'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>";
			if($row['available']>0) echo "<input type=\"checkbox\" name=\"lend-list[]\" value=\"" . $row['i_id'] ."\">";
			echo "</td></tr>";
		}
		
		echo "</table>";
		echo "<input class=\"submit-items\" type=\"submit\" value=\"Posudi\">";
		echo "</form>";
	?>

<?php include 'html/html_bot.php';?>