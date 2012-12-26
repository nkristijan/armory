<html>
	<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="armory.css">
	<link rel="icon" type="image/png" href="pics/favicon.png">
	<title>Oružarstvo - <?php echo $title;?></title>
	</head>
	
	<body>
		<div id="global">
		<div id="header">
			<label id="header-text">Oružarstvo</label>
			<label id="header-logout"><?php include 'scripts/name.php';?></label>
		<div>
			<table id="menu">
				<tr><td><a href="items.php">Oprema</a></td>
				<td><a href="members.php">Članovi</a></td>
				<td><a href="lends.php">Posudbe</a></td>
				<td><a href="log.php">Dnevnik</a></td></tr>
			</table>
		</div>
		</div>
		<div id="content">
			<div id="content-center">