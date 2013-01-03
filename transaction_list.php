<?php
include 'scripts/admin_login.php'; 
$title = "Posudba opreme";
include 'html/user_html_top.php'; 
?>

	<?php
		include 'scripts\db_con.php';
		$today = date("Y-m-d");
		$userId = $_SESSION['userId'];
		
		
		if(empty($_POST['transaction-list'])) {
			echo "<script>window.alert(\"Odaberi opremu koju želiš prenjeti.\");	
			window.location = \"user_lends.php\"</script>";	
		}
				
		echo "<div id=\"content-header1\"></div>
		<form action=\"scripts/transact.php\" method=\"post\">
		<table  id=\"content-table\" cellspacing=\"0\">
		<tr class=\"tbl-row\">
		<td style=\"width:90px;\">Tip</td>
		<td style=\"width:90px;\">Proizvođač</td>
		<td style=\"width:90px;\">Model</td>
		<td style=\"width:110px;\">Boja</td>
		<td style=\"width:70px;\">Komada posuđeno</td>
		<td style=\"width:190px;\">Opis</td>
		<td style=\"width:90px;\">Posuđeno</td>
		<td style=\"width:90px;\">Vratiti do</td>
		<td style=\"width:100px;\">Količina</td></tr>";
		
		$i=0;
		foreach($_POST['transaction-list'] as $check){
			
			$result =  mysql_query("SELECT items.i_id, items.`type`, items.brand, items.model, items.color, items.season, items.description, lends.l_id, lends.quantity, lends.lend_date, lends.return_by
					FROM members
					JOIN lends ON members.m_id = lends.member_id
					JOIN items ON lends.item_id = items.i_id
					WHERE m_id = $userId AND i_id = $check", $con);
			$row = mysql_fetch_array($result);
		
				if($i%2==0) echo "<tr class=\"row0\">";
				else echo "<tr class=\"row1\">";

				echo "<input type=\"hidden\" value=\"" . $check . "\" name=\"id[]\">". "</td>"; //hidden
				echo "<input type=\"hidden\" value=\"" . $row['l_id'] . "\" name=\"lend[]\">". "</td>"; //hidden
				echo "<td>" . $row['type'] . "</td>";
				echo "<td>" . $row['brand'] . "</td>";
				echo "<td>" . $row['model'] . "</td>";
				echo "<td>" . $row['color'] . "</td>";
				echo "<td>" . $row['quantity'] . "</td>";
				echo "<input type=\"hidden\" value=\"" . $row['quantity'] . "\" name=\"lend-quantity[]\">". "</td>"; //hidden
				echo "<td>" . $row['description'] . "</td>";
				if(substr($today > $row['return_by'],0,10)) { echo "<td class=\"red\">" . substr($row['lend_date'],0,10) . "</td>
		       													      <td class=\"red\">" . substr($row['return_by'],0,10) . "</td>"; }
			    else{ echo "<td>" . substr($row['lend_date'],0,10) . "</td>
			                <td>" . substr($row['return_by'],0,10) . "</td>";}
			    echo "<td><input type=\"number\" class=\"input-table-number\" value=\"" .$row['quantity'] . "\" name=\"quantity-list[]\"></td>";
				echo  "</tr>";
				$i++;
		}
		echo "</table>";
		
		
		
		
		echo "<input class=\"submit-items\" type=\"submit\" value=\"Prenesi\">";
		echo "<select class=\"select-user\" name=\"user\">";
		
			$usernameQuery = mysql_query("SELECT username, m_id FROM members", $con);
			for($i=0; $users = mysql_fetch_array($usernameQuery); $i++){
				if($users['m_id'] != $userId) echo "<option name=\"user\">" . $users['username'] . "</option>";
			}
		
		echo "</select></form>";
	?>	

<?php include 'html/html_bot.php'?>