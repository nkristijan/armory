<?php
include 'scripts/admin_login.php'; 
$title = "Posudba opreme";
include 'html/administration_html_top.php'; 
?>

	<?php
		include "scripts/armory_utils.php";
		include 'scripts/db_con.php';
		
		if(empty($_POST['lend-list'])) {
			echo "<script>window.alert(\"Odaberi opremu koju želiš posuditi.\");	
			window.location = \"items.php\"</script>";	
		}
		
		echo "<div id=\"content-header1\"></div>
		<form action=\"scripts/lend.php\" method=\"post\">
		<table  id=\"content-table\" cellspacing=\"0\">
		<tr class=\"tbl-row\">
		<td style=\"width:90px;\">Tip</td>
		<td style=\"width:90px;\">Proizvođač</td>
		<td style=\"width:90px;\">Model</td>
		<td style=\"width:130px;\">Boja</td>
		<td style=\"width:80px;\">Sezona</td>
		<td style=\"width:80px;\">Dostupno</td>
		<td style=\"width:140px;\">Opis</td>
		<td style=\"width:100px;\">Količina</td></tr>";
		
		$i=0;
		foreach($_POST['lend-list'] as $check) {
			$lendQuery = mysql_query("SELECT * FROM items WHERE i_id = " . $check . " ORDER BY type", $con);
			$lendTable = mysql_fetch_array($lendQuery);
			
			if($i%2==0) echo "<tr class=\"row1\">";
			else echo "<tr class=\"row0\">";
			
			echo "<td>" . $lendTable['type'];
			echo "<input type=\"hidden\" value=\"" . $check . "\" name=\"id[]\">". "</td>"; //hidden
			echo "<td>" . $lendTable['brand'] . "</td>";
			echo "<td>" . $lendTable['model'] . "</td>";
			echo "<td>" . $lendTable['color'] . "</td>";
			echo "<td>" . $lendTable['season'] . "</td>";
			echo "<td>" . $lendTable['available'] . "/" .$lendTable['quantity'] . "</td>";
			echo "<td>" . $lendTable['description'] . "</td>";
			echo "<td><input type=\"number\" class=\"input-table-number\" value=\"1\" name=\"quantity-list[]\"></td>";
			echo "</tr>";
			$i++;
		}
		
		echo "</table>";
		echo "<input class=\"submit-items\" type=\"submit\" value=\"Posudi\">";
		echo "<select class=\"select-user\" name=\"select-user\">";
		
			$usernameQuery = mysql_query("SELECT username FROM members", $con);
			for($i=0; $users = mysql_fetch_array($usernameQuery); $i++){
				echo "<option name=\"user\">" . $users['username'] . "</option>";
			}
		
		echo "</select></form>";
	?>	

<?php include 'html/html_bot.php'?>