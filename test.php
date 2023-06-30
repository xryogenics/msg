<html>
<head>
    <title>Space Clicker</title>
</head>

<body>

  <input id="button" type="submit" name="button" value="enter"/>

  <script type="text/javascript">
	var count = 1;
	document.getElementById('button').onclick = function() {
	   alert("button was clicked " + (count++) + " times");
	};
  </script>

</body></html>