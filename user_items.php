<?php 
include 'scripts/user_login.php'; 
$title = "Oprema";
include 'html/user_html_top.php'; 
?>
			
	<?php
		include 'scripts\db_con.php';
		
		echo "<div id=\"content-header1\">
			  </div>";
		
		$result =  mysql_query("SELECT * FROM items ORDER BY type", $con);
		
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:100px;\">Tip</td>
		<td style=\"width:100px;\">Proizvođač</td>
		<td style=\"width:100px;\">Model</td>
		<td style=\"width:110px;\">Boja</td>
		<td style=\"width:80px;\">Sezona</td>
		<td style=\"width:80px;\">Dostupno</td>
		<td style=\"width:230px;\">Opis</td></tr>";
		
		for($i = 0; $row = mysql_fetch_array($result); $i++){
			
			if($i%2==0) echo "<tr class=\"row1\">";
			else echo "<tr class=\"row0\">";
			
			echo "<td>" . $row['type'] . "</td>";
			echo "<td>" . $row['brand'] . "</td>";
			echo "<td>" . $row['model'] . "</td>";
			echo "<td>" . $row['color'] . "</td>";
			echo "<td>" . $row['season'] . "</td>";
			echo "<td>" . $row['available'] . "/" .$row['quantity'] . "</td>";
			echo "<td>" . $row['description'] . "</td></tr>";
		}
		
		echo "</table>";
	?>

<?php include 'html/html_bot.php';?>