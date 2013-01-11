<?php
include 'scripts/admin_login.php'; 
$title = "Posudbe";
include 'html/administration_html_top.php'; 
?>

	<?php
		include 'scripts\db_con.php';
		$today = date("Y-m-d");
		
		echo "<div id=\"content-header1\"></div>";
		
		$result =  mysqli_query($mysqli, "SELECT members.first_name, members.last_name, items.i_id, items.`type`, items.brand, items.model, items.color, items.description, lends.l_id, lends.quantity, lends.lend_date, lends.return_by
		FROM members 
		JOIN lends ON members.m_id = lends.member_id 
		JOIN items ON lends.item_id = items.i_id
		WHERE active = 1
		ORDER BY lends.lend_date DESC");
		
		echo "<form action=\"return_list.php\" method=\"post\">";
		
		echo "<table id=\"content-table\" cellspacing=\"0\">";
		echo "<tr class=\"tbl-row\"><td style=\"width:100px;\">Ime</td>
		<td style=\"width:180px;\">Predmet</td>
		<td style=\"width:100px;\">Boja</td>
		<td style=\"width:190px;\">Opis</td>
		<td style=\"width:50px;\">Količina</td>
		<td style=\"width:90px;\">Posuđeno</td>
		<td style=\"width:90px;\">Vratiti do</td>
		<td style=\"width:40px;\">Vrati</td></tr>";
		
		for($i = 0; $row = mysqli_fetch_array($result); $i++){
			
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
			echo "<td>" . $row['type'] . "&nbsp&nbsp" . $row['brand'] . "&nbsp&nbsp" . $row['model'] . "</td>";
			echo "<td>" . $row['color'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['quantity'] . "</td>";
			if(substr($today > $row['return_by'],0,10)) { echo "<td class=\"red\">" . substr($row['lend_date'],0,10) . "</td>
	       													      <td class=\"red\">" . substr($row['return_by'],0,10) . "</td>"; }
		    else{ echo "<td>" . substr($row['lend_date'],0,10) . "</td>
		                <td>" . substr($row['return_by'],0,10) . "</td>";}
			echo "<td><input type=\"checkbox\" name=\"lend_id[]\" value=\"" . $row['l_id'] . "\"></td>";
			echo  "</tr>";
			
			$name = $row['last_name'];
		}
		
		echo "</table>";
		echo "<input class=\"submit-items\" type=\"submit\" value=\"Vrati opremu\">";
	?>

<?php include 'html/html_bot.php'?>