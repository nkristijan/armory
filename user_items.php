<?php 
include 'scripts/user_login.php'; 
$title = "Oprema";
include 'html/user_html_top.php'; 

echo "<script>
		function nextPage(num){
			var xmlhttp;
			xmlhttp = new XMLHttpRequest ();
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementsByClassName(\"content-table\")[0].innerHTML=xmlhttp.responseText;
				num++;
				document.getElementById(\"next-page\").onclick = function(){nextPage(num);};
			    }
			  }
			xmlhttp.open(\"POST\",\"scripts/next_page.php?num=\"+num,true);
			xmlhttp.send();
		}
	  </script>";
?>
			
	<?php
		include 'scripts\db_con.php';
		$pageQuery = mysqli_query($mysqli, "SELECT i_id FROM items;");
		$pages = mysqli_num_rows($pageQuery)/10+1;
		$pages = (int)$pages;
		
		
		echo "<div id=\"content-header1\">
			  </div>";

		echo "<table class=\"content-table\" cellspacing=\"0\">";
		$result =  mysqli_query($mysqli, "SELECT * FROM items WHERE i_id < 16 ORDER BY type");
		echo "<tr class=\"tbl-row\"><td style=\"width:100px;\">Tip</td>
		<td style=\"width:100px;\">Proizvođač</td>
		<td style=\"width:100px;\">Model</td>
		<td style=\"width:110px;\">Boja</td>
		<td style=\"width:80px;\">Sezona</td>
		<td style=\"width:80px;\">Dostupno</td>
		<td style=\"width:230px;\">Opis</td></tr>";

		
		for($i = 0; $row = mysqli_fetch_array($result); $i++){
			
			if($i%2==0) echo "<tr class=\"row1\">";
			else echo "<tr class=\"row0\">";
			
			echo "<td>" . $row['type'] . "</td>";
			echo "<td>" . $row['brand'] . "</td>";
			echo "<td>" . $row['model'] . "</td>";
			echo "<td>" . $row['color'] . "</td>";
			echo "<td>" . $row['season'] . "</td>";
			echo "<td>" . $row['available'] . "/" .$row['quantity'] . "</td>";
			echo "<td>" . $row['description'] . "</td></tr>";

		}
		
		echo "</table>";
		echo "	<a id=\"next-page\" onclick=\"nextPage(2)\"><div class=\"next\"></div></a>
				<a id=\"previous-page\" onclick=\"previousPage()\"><div class=\"previous\"></div></a>";
	?>

<?php include 'html/html_bot.php';?>