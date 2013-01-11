<html>
	<head>
	<title>Oružarstvo - <?php echo $title;?></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="armory.css">
	<link rel="icon" type="image/png" href="pics/favicon.png">
	<?php include 'scripts/armory_utils.php'; ?>
	
	<script src="scripts/jquery1.8.3.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#settings-icon").click(function(){
				$("#settings-menu").fadeIn(200);
			});
		});
		$(document).ready(function(){
			$("#global").click(function(e){
				if(e.target.id != "settings-icon" && e.target.id != "settings-menu") {
					$("#settings-menu").hide();
				}
			});
			
		});
	</script>
	</head>
	
	<body>
		<div id="global">
		<div id="header">
			<div id="settings-icon">
				<div id="settings-menu">
					<table id="settings-table">
						<tr><td><a href="new_member_form.php">Novi korisnik</a></td></tr>
						<tr><td><a href="new_item_form.php">Novi predmet</a></td></tr>
					</table>
				</div>
			</div>
			
			<label id="header-text">Oružarstvo</label>
			<label id="header-logout" style="right:-12"><a href="edit_member_form.php">|&nbsp&nbsp<?php names();?></a></label>
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