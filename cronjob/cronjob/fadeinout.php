<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
    $("#btn").click(function(){
	        $("#div1").fadeOut();
	        $("#div2").fadeOut("slow");
	        $("#div3").fadeOut(3000);
    });

    $("#fadein_btn").click(function(){
    	
	        $("#div1").fadeIn();
	        $("#div2").fadeIn("slow");
	        $("#div3").fadeIn(3000);

    });
});
</script>
</head>
<body>

<p>Demonstrate fadeOut() with different parameters.</p>

<button id="btn">Click to fade out boxes</button><br><br>
<button id="fadein_btn">Click to fade IN</button><br><br>

<div id="div1" style="width:80px;height:80px;background-color:red;"></div><br>
<div id="div2" style="width:80px;height:80px;background-color:green;"></div><br>
<div id="div3" style="width:80px;height:80px;background-color:blue;"></div>

</body>
</html>
