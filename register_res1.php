
<html>
<head><title></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
<link rel="stylesheet" href="stylesheet/stylesheet.css">
<link href="script/script.js">
<meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
  <meta name="author" content="Vineet Poojary">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?PHP include "header.php";?>
<?php include ("navbar.php");?>
<div class="hero-image">
   <form class="box" action="register_res1.php" method="post">
  <div class="field">
    <label class="label">Building Code</label>
    <div class="control">
      <input class="input" type="text" placeholder="Enter your Building" name="code">
    </div>
  </div>
  <div class="field">
    <label class="label">Password</label>
    <div class="control">
      <input class="input" type="password" placeholder="********" name="password" id="pass">
    </div>
  </div>
  <div>
  <input type="checkbox" onclick="myFunction()">Show Password
</div>
<div class="has-text-centered">
  <input type="submit"button class="button is-dark" value="submit"></button>
  <input type="reset" button class="button is-light"></button>
</form>
</div>
</div>
<?PHP include "footer.php";?>
</body></html>
<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  if ($_POST["code"]=="building" &&  $_POST["password"]=="qwerty"){
      header ("location:register_res2.php");
  }else{
    echo("<cript><alert>(\"invalid password\")</scrript>");
  }
}
?>
<script>
  function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
