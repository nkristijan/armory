<html>
<head>
	
</head>
	<body>
		<?php 
		
		include 'scripts/db_con.php';
		
		$idQuery = mysqli_query($mysqli, "SELECT m_id, account_admin FROM members WHERE username = 'nkristijan' AND password = '12345'");
		$loginResult = mysqli_num_rows($idQuery);
		echo $loginResult;
		
		
		?>
		

	</body>
</html>