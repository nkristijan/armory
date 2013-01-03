<html>
	<body>
		
		<?php
		include 'scripts\db_con.php';
			
		
		$query = mysql_query("SELECT quantity FROM lends WHERE l_id=1", $con);
		$res = mysql_fetch_array($query);
		
		echo $res['quantity'];
		
		echo "<br><input type=\"number\">" 
		
		?>

	</body>
</html>