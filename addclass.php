<html>
   <head>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>
      $(document).ready(function() {
        $("a").click(function() {
          $("a.active").removeClass("active");
          $(this).addClass("active");
        });
      });
      </script>
      <style>
      .active {
         font-size: 22px; 
         border-color: green; 
      }
      </style>
   </head>
   <body>
      <a href="#" class="">One</a>
      <a href="#" class="">Two</a>
      <p>Click any of the link above and you can see the changes.</p>
   </body>
</html>