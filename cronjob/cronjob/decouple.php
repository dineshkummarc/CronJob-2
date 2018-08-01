<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <textarea name="content" id="editor">
        <p>This is some sample content.</p>
    </textarea>
   <!--  <figure class="image">
        <img src="C:\Users\User\Desktop\download.jpg" alt="">
        <figcaption>Caption goes here...</figcaption>
   </figure> -->

    <script>
      ClassicEditor
           .create( document.querySelector( '#editor' ), {
            
        toolbar: [ 'heading', '|', 'undo', 'redo', 'bold', 'italic', 'bulletedList', 'numberedList', 'imageUpload' ],
            ckfinder: 
            {
               uploadUrl: 'http://localhost:8090/cronjob/imagesupload.php/retieve_data'

            }
    } )
    .then()
    .catch();
    </script>
 </script>
</body>
</html>