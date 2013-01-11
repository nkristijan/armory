<?php
include 'scripts/user_login.php';
$title = "Moje Posudbe";
include 'html/user_html_top.php';
?>

	<?php
		include 'scripts\db_con.php';
		$today = date("Y-m-d");
		$userId = $_SESSION['userId'];
		
		echo "<div id=\"content-header1\"></div>";
		
		$result =  mysqli_query($mysqli, "SELECT items.i_id, items.`type`, items.brand, items.model, items.color, items.season, items.description, lends.quantity, lends.lend_date, lends.return_by
			FROM members
			JOIN lends ON members.m_id = lends.member_id
			JOIN items ON lends.item_id = items.i_id
			WHERE m_id = $userId AND active = 1
			ORDER BY lend_date DESC");
			
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:90px;\">Tip</td>
			<td style=\"width:100px;\">Proizvođač</td>
			<td style=\"width:100px;\">Model</td>
			<td style=\"width:120px;\">Boja</td>
			<td style=\"width:80px;\">Količina</td>
			<td style=\"width:200px;\">Opis</td>
			<td style=\"width:90px;\">Posuđeno</td>
			<td style=\"width:90px;\">Vratiti do</td>
			</tr>";
			
			
		for($i = 0; $row = mysqli_fetch_array($result); $i++){
		
				if($i%2==0) echo "<tr class=\"row0\">";
				else echo "<tr class=\"row1\">";
// 				echo "<form action=\"transaction_list.php\" method=\"post\">";
				
				echo "<td>" . $row['type'] . "</td>";
				echo "<td>" . $row['brand'] . "</td>";
				echo "<td>" . $row['model'] . "</td>";
				echo "<td>" . $row['color'] . "</td>";
				echo "<td>" . $row['quantity'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				if(substr($today > $row['return_by'],0,10)) { echo "<td class=\"red\">" . substr($row['lend_date'],0,10) . "</td>
		       													      <td class=\"red\">" . substr($row['return_by'],0,10) . "</td>"; }
			    else{ echo "<td>" . substr($row['lend_date'],0,10) . "</td>
			                <td>" . substr($row['return_by'],0,10) . "</td>";}
// 			    echo "<td><input type=\"checkbox\" name=\"transaction-list[]\" value=\"" . $row['i_id'] . "\"></td>";
				echo  "</tr>";
		
		}
		echo "</table>";
// 		echo "<input class=\"submit-items\" type=\"submit\" value=\"Prenesi opremu\">";
	?>
			
<?php include 'html/html_bot.php';?>