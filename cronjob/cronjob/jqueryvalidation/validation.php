<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
  </script>

<script>
$(function){
  $("form[name='registration']").validate({

    rules:{
      firstname:"required",
      lastname:"required",
      email:{
          required:true,
          email:true
      },

      //end of the rules 
    },

  });
};


</script>
</head>
<body>
  <div class="container">
  <h2>Registration</h2>
  <form action="" name="registration">

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" placeholder="John">

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" placeholder="Doe">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="john@doe.com">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

    <button type="submit">Register</button>
  </form>
</div>
</body>
</html>

