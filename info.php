<html>
<head>
	
</head>
	<body>
		<?php 
		
		$mysqli = new mysqli('localhost', 'root', 'root', 'armory');
		
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		$res = $mysqli->query("SELECT * FROM members");
		$count = $res->num_rows;
		
		$row = $res->fetch_assoc();
		
		echo $count;
		echo $row['last_name'];
		
		?>
		

	</body>
</html>