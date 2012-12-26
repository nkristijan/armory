<?php

	$itemsList = $_POST['items-id-list'];
	$lendsList = $_POST['lends-id-list'];
	$returnQuant = $_POST['quantity-list'];
	
	include 'db_con.php';
	
	for($i=0; $i<count($lendsList); $i++){
		date_default_timezone_set('Europe/Zagreb');
		$today = date("Y-m-d H:i:s");
		
		$lendedQuant = mysql_fetch_array(mysql_query("SELECT quantity FROM lends WHERE l_id= " . $lendsList[$i], $con));
		$itemsQuant = mysql_fetch_array(mysql_query("SELECT quantity FROM items WHERE i_id= " . $itemsList[$i], $con));
		$itemsAvailable = mysql_fetch_array(mysql_query("SELECT available FROM items WHERE i_id= " . $itemsList[$i], $con));
		
		$stillLended = $lendedQuant[0] - $returnQuant[$i];
			
		

		if(($itemsAvailable[0]+$returnQuant[$i]) >= $itemsQuant[0]) mysql_query("UPDATE items SET available = '$itemsQuant[0]' WHERE i_id = '$itemsList[$i]'", $con);
		else if(($itemsAvailable[0]+$returnQuant[$i]) < 0) mysql_query("UPDATE items SET available = '$itemsAvailable[0]' WHERE i_id = '$itemsList[$i]'", $con);
		else mysql_query("UPDATE items SET available = available + " . $returnQuant[$i] . " WHERE	i_id = '$itemsList[$i]'", $con);
		
		if($stillLended <= 0) mysql_query("UPDATE lends SET active = 0, return_date = '$today' WHERE l_id = " . $lendsList[$i], $con);
		else if(($stillLended > $itemsQuant[0])) mysql_query("UPDATE lends SET quantity = '$lendedQuant[$i]'  WHERE l_id = '$lendsList[$i]'" , $con);
		else mysql_query("UPDATE lends SET quantity = '$stillLended'  WHERE l_id = '$lendsList[$i]'" , $con);
		
	}
	
	echo "<script>window.location = \"../lends.php\"</script>";
	
?>