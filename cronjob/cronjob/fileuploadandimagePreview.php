<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<input type="file" accept="image/*" onchange="showMyImage(this)"/><br/>

<img id="thumbnil" style="width:6%; margin-top:16px;" src="" alt="image"/><br/>



No <input type="checkbox" name="answer" checked="checked" value="no"/> <br><br>
Yes<input type="checkbox" name="answer" value="yes"/> <br><br>

Other <input type="checkbox" name="answer" value="other"/><br>

<input style="display:none;" type="text" name="otherAnswer" id="otherAnswer"/>

<script>

  $(document).ready(function(){
    
    $("input[type='checkbox']").change(function(){
    	if($(this).val()=='other'){

    		$('#otherAnswer').show();
    	}
    	else
    	{
    		$('#otherAnswer').hide();
    	}
    });
  });

function showMyImage(fileinput){
	var files = fileinput.files;
	for(var i=0 ; i < files.length; i++){
		var file = files[i];
		var imageType = /image.*/;
		if (!file.type.match(imageType)) 
		{
        	continue;
		} 
		console.log(file);
		var  img = document.getElementById("thumbnil");
		img.file = file; 
		var reader = new FileReader();
		reader.onload = (function(aImg){
			return function(e) { 
			aImg.src = e.target.result; 
			}; 
		})(img);
		reader.readAsDataURL(file);
	}

}

</script>