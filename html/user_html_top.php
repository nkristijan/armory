<html>
	<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="armory.css">
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
				<tr><td><a href="user_lends.php">Posudbe</a></td>
				<?php 
				if($_SESSION["user"]==1) echo "<td style=\"color:red\"><a href=\"items.php\">Administracija</a></td>";
				?>
				</tr>
			</table>
		</div>
		</div>
		<div id="content">
			<div id="content-center">