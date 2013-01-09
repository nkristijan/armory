<html>
<head>
	<script>
		function nextPage(#){
			var xmlhttp;
			xmlhttp = new XMLHttpRequest ();
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementsByClassName("content-table")[0].innerHTML=xmlhttp.responseText;
				#++;
				document.getElementById("next-page").onclick = function(){nextPage(#);};
			    }
			  }
			xmlhttp.open("POST","scripts/next_page.php?#="+#,true);
			xmlhttp.send();
		}
	  </script>
</head>
	<body>
		
		<div class="content"></div>
		
		<input type="button" onclick="nextPage()" value="napisi">
		
		

	</body>
</html>