<input type="file" accept="image/*" onchange="loadFile(event)">
<img id="output"/>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>



<!-- function add_photo_to_gallery($data) {
        extract($data);
        $array = [
            "image" => $image,
            "title" => $title,
            "created_at" => time(),
            "user_id" => $user_id
        ];
        $this->db->insert("user_photo_gallery", $array);
    } -->