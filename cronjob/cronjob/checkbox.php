<html>
<head>
<script src="https://code.jquery.com/jquery-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Select All</title>	
</head>
<body>
<ul class="chk-container">
	<li>
		<input type="checkbox" name="permission" id="selectall"/>SelectAll
	</li>

	<li>
		<input class="permission" type="checkbox" name="check[]" value="1">View Post
	</li>


	<li>
		<input class="permission" type="checkbox" name="check[]" value="2">List Post
	</li>

	<li>
		<input class="permission" type="checkbox" name="check[]" value="3">Add Post
	</li>


	<li>
		<input class="permission" type="checkbox" name="check[]" value="4">Delete Post
	</li>

	<li>
		<input class="permission" type="checkbox" name="check[]" value="5">Put Post
	</li>

	<li>
		<input class="permission" type="checkbox" name="check[]" value="6">Create User
	</li>

</ul>	
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#selectall').click(function(event) { 
	        if(this.checked) 
	        { // check select status
	            $('.permission').each(function() { 
	                this.checked = true;  //select all 
	            });

	        }
	        else
	        {
	            $('.permission').each(function() { 
	                this.checked = false; //deselect all             
	            });        
	        }
	    });
	   
	});

</script>



