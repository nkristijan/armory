<?php
include 'scripts/admin_login.php'; 
$title = "Vraćanje opreme";
include 'html/html_top.php'; 
?>

	<?php
		include "scripts/armory_utils.php";
		include "scripts/db_con.php";
		$today = date("Y-m-d");
		
		if(empty($_POST['lend_id'])) {
			echo "<script>window.alert(\"Odaberi opremu koju želiš vratiti.\");
			window.location = \"lends.php\"</script>";
		}
		
		echo "<div id=\"content-header1\">
			  Vrati opremu:
			  </div>";
		
		$lendId = $_POST['lend_id'];
		
		echo "<form action=\"scripts/return.php\" method=\"post\">";
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:100px;\">Ime</td>
			<td style=\"width:150px;\">Predmet</td>
			<td style=\"width:100px;\">Boja</td>
			<td style=\"width:170px;\">Opis</td>
			<td style=\"width:40px;\">Posuđeno komada</td>
			<td style=\"width:90px;\">Posuđeno</td>
			<td style=\"width:90px;\">Vratiti do</td>
			<td style=\"width:60px;\">Vraća</td></tr>";
		
		for($i = 0; $i < count($lendId); $i++){
			
			$result =  mysql_query("SELECT members.first_name, members.last_name, items.i_id, items.`type`, items.brand, items.model, items.color, items.description, lends.l_id, lends.quantity, lends.lend_date, lends.return_by
			FROM members
			JOIN lends ON members.m_id = lends.member_id
			JOIN items ON lends.item_id = items.i_id
			WHERE lends.l_id = '$lendId[$i]'", $con);
			$row = mysql_fetch_array($result);
		
			if($i==0) {
				echo "<tr class=\"row0\">";
				$name = $row['last_name'];
				$style = 0;}
		
			if($i != 0 && $row['last_name'] != $name){
				$style++;
				$style = $style%2;
				echo "<tr class=\"row" . $style . "\">";}
				else echo "<tr class=\"row" . $style . "\">";
		
			echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
			echo "<td>" . $row['type'] . "&nbsp&nbsp" . $row['brand'] . "&nbsp&nbsp" . $row['model'] . 
			"<input type=\"hidden\" name=\"lends-id-list[]\" value=\"" .  $row['l_id'] . "\">  
			<input type=\"hidden\" name=\"items-id-list[]\" value=\"" .  $row['i_id'] . "\"></td>"; //hidden
			echo "<td>" . $row['color'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['quantity'] . "</td>";
			if(substr($today > $row['return_by'],0,10)) { echo "<td class=\"red\">" . substr($row['lend_date'],0,10) . "</td>
			                                                      <td class=\"red\">" . substr($row['return_by'],0,10) . "</td>"; }
			else{ echo "<td>" . substr($row['lend_date'],0,10) . "</td>
			            <td>" . substr($row['return_by'],0,10) . "</td>";}
			echo "<td><input type=\"number\" class=\"input-table-number\" name=\"quantity-list[]\" value=\"" .  $row['quantity'] . "\"></td></tr>";
			
			$name = $row['last_name'];
		}
		
		echo "</table>
		 	  <input class=\"submit-items\" type=\"submit\" value=\"Potvrdi\">
			  </form>";
			
	?>	

<?php include 'html/html_bot.php'?>