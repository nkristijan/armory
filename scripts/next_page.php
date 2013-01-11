<?php
	include 'db_con.php';	
	
	$page = $_GET['num'];
	$low = ($page-1)*15;
	$high = $page*15+1;

	$result =  mysqli_query($mysqli, "SELECT * FROM items WHERE i_id > $low AND i_id < $high ORDER BY type");
	$count = mysql_fetch_array($result);
	

// 	document.getElementById('next-page').removeAttribute('href');
	echo "<table class=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:100px;\">Tip</td>
		<td style=\"width:100px;\">Proizvođač</td>
		<td style=\"width:100px;\">Model</td>
		<td style=\"width:110px;\">Boja</td>
		<td style=\"width:80px;\">Sezona</td>
		<td style=\"width:80px;\">Dostupno</td>
		<td style=\"width:230px;\">Opis</td></tr>";

		
		for($i = 0; $row = mysqli_fetch_array($result); $i++){
			
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