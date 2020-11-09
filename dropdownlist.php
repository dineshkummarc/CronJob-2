<html>
<head>
<script src="https://code.jquery.com/jquery-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Add options to a drop-down list using jQuery.</title>	

</head>
<body>
	<p>list of colors</p>
	<select id="mycolor">
		<option value="Red">Red</option>
		<option value="Blue">Blue</option>
		<option value="Green">Green</option>
	</select>

</body>
</html>

<script type="text/javascript">

	var myOptions = 
	{
		    val1 : 'Popat',
		    val2 : 'Kabar'
	};
	

		var select = $('#mycolor');
		debugger;
		$.each(myOptions,function(val,text){
				select.append
				(
					$('<option></option>').val(val).html(text)
				);
		});

</script>