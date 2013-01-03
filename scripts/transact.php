<?php

	include  "db_con.php";
	
	$item = $_POST['id'];
	$lendQuantity = $_POST['lend-quantity'];
	$transQuantity = $_POST['quantity-list'];
	$user = $_POST['user'];
	$lend = $_POST['lend'];

	date_default_timezone_set('Europe/Zagreb');
	$today = date("Y-m-d H:i:s");
	
	for ($i=0; $i < count($item); $i++){
		
		if($transQuantity[$i] >= $lendQuantity[$i]) {
			mysql_query("UPDATE lends SET return_date = $today, active = 0 WHERE l_id = $lend[$i]"); 
		}
		
		
		
		else if($transQuantity[$i] > 0 && $transQuantity[$i] < $lendQuantity[$i]) {
			mysql_query("UPDATE lends SET quantity = quantity - $transQuantity[$i] WHERE l_id = $lend[$i]"); 
		}
		
		
	}
	
	echo "<script>window.location = \"../user_lends.php\"</script>";

?>