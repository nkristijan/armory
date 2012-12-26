<?php
include 'scripts/admin_login.php'; 
$title = "Dnevnik";
include 'html/html_top.php'; 
?>

	<?php
		include 'scripts/db_con.php';
		echo "<div id=\"content-header1\">
			  <form action=\"log.php\" method=\"link\"><input type=\"text\" name=\"search\"><input type=\"submit\" value=\"Traži\">
			  </form>
			  </div>";
		
		$logQuery = mysql_query("(SELECT members.first_name, members.last_name, items.`type`, items.brand, items.model, items.color, lends.quantity, lends.return_by, lends.lend_date as datum, 'posudio' as tip
				FROM members
				JOIN lends ON members.m_id = lends.member_id 
				JOIN items ON lends.item_id = items.i_id)
		
		UNION ALL
				
		(SELECT members.first_name, members.last_name, items.`type`, items.brand, items.model, items.color, lends.quantity, lends.return_by, lends.return_date as datum, 'vratio' as tip
						FROM members
						JOIN lends ON members.m_id = lends.member_id
						JOIN items ON lends.item_id = items.i_id)
				
		ORDER BY datum DESC", $con);
		
		
		echo "<table id=\"content-table\" cellspacing=\"0\" style=\"width:800px\">";
		for($i = 0; $logs = mysql_fetch_array($logQuery); $i++){
				
			if($i==0) {
				echo "<tr class=\"row0\">";
				$name = $logs['last_name'];
				$style = 0;}
					
			if($i != 0 && $logs['last_name'] != $name){
				$style++;
				$style = $style%2;
				echo "<tr class=\"row" . $style . "\">";}
				else echo "<tr class=\"row" . $style . "\">";

			if($logs['datum'] == NULL) die;	
			else echo "<td style=\"text-align:left;\">" . substr($logs['datum'],0,10) . " " . $logs['first_name'] . " " . $logs['last_name'] . " " . $logs['tip'] . " " . $logs['quantity'] . "X " . $logs['type'] . " " . $logs['brand'] . " " . $logs['model'] .
			" boje: " . $logs['color'] . ". Datum do kada mora vratiti: " . substr($logs['return_by'],0,10) . "</td>";
					
					echo  "</tr>";
						
					$name = $logs['last_name'];
		}
		echo "</table>";
	
	?>

<?php include 'html/html_bot.php'?>