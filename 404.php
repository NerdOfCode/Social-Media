<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"></link>
</head>

<body>
	<h1 id="center">PAGE NOT FOUND --> 404</h1><hr>

	<button type="button" id="button" onclick="window.location = '/index.php'">Home</button><br>

	
	<script>
		if(document.referrer){
			document.write("Previous Page: <a href=\"" + document.referrer + "\">here</a>");
		}

	</script>


</body>



</html>
