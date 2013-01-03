<?php
	
	$itemId = $_POST["id"];
	$quantList = $_POST["quantity-list"];
	$username = $_POST["select-user"];
	
	$con = mysql_connect("localhost","root","root");
	if(!$con) die("Could not connect: " . mysql_error());
	mysql_set_charset("utf8",$con);
	mysql_select_db("armory", $con);
	
	date_default_timezone_set('Europe/Zagreb');
	$lendDate = date("Y-m-d H:i:s");
	
	$memberQuery = mysql_query("SELECT m_id FROM members WHERE username = '$username'", $con);
	$memberId = mysql_fetch_array($memberQuery);
	$id = $memberId[0];
	
	for($i=0; $i<count($itemId); $i++){
		
		$seasonType = mysql_fetch_array(mysql_query("SELECT season FROM items WHERE i_id = '$itemId[$i]'", $con));
		if($seasonType[0]=='zima') $returnBy = date("Y-m-d H:i:s", strtotime('+14 day'));
		else $returnBy = date("Y-m-d H:i:s", strtotime('+1 month'));
		
		$itemsAvailable = mysql_fetch_array(mysql_query("SELECT available FROM items WHERE i_id = '$itemId[$i]'", $con));
		$itemsQuantity = mysql_fetch_array(mysql_query("SELECT quantity FROM items WHERE i_id = '$itemId[$i]'", $con));
		
		//ako unese 0 za količinu
		if($quantList[$i] <= 0 ) mysql_query("UPDATE items SET available = " . $itemsAvailable . " WHERE i_id = " . $itemId[$i]);
		else if($quantList[$i] >= $itemsAvailable[0]) {mysql_query("UPDATE items SET available = 0 WHERE i_id = " . $itemId[$i]);
			mysql_query("INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, return_date, active)
			VALUES ('$lendDate', '$id', '$itemId[$i]', '$itemsAvailable[0]', '$returnBy', NULL, 1)");}
		else {mysql_query("UPDATE items SET available = available - " . $quantList[$i] . " WHERE i_id = " . $itemId[$i]);
			mysql_query("INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, return_date, active)
			VALUES ('$lendDate', '$id', '$itemId[$i]', '$quantList[$i]', '$returnBy', NULL,  1)");}
		
		
	
	}
	
	echo "<script>window.location = \"../items.php\"</script>";
		
?>