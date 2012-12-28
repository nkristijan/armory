<html>
	<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="armory.css">
	<link rel="icon" type="image/png" href="pics/favicon.png">
	<title>Oružarstvo - <?php echo $title;?></title>
	<?php include 'scripts/armory_utils.php'; ?>
	</head>
	
	<body>
		<div id="global">
		<div id="header">
			<label id="header-text">Oružarstvo</label>
			<label id="header-logout"><a href="edit_member_form.php"><?php names();?></a></label>
		<div>
			<table id="menu">
				<tr><td><a href="items.php">Oprema</a></td>
				<td><a href="members.php">Članovi</a></td>
				<td><a href="lends.php">Posudbe</a></td>
				<td><a href="log.php">Dnevnik</a></td>
				<td style="color:red"><a href="user_lends.php">Izlaz</a></td></tr>
			</table>
		</div>
		</div>
		<div id="content">
			<div id="content-center">