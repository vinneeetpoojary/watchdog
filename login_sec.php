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
<?php include ("header.php");?>
<?php include ("navbar.php");?>
<div class="hero-image">

<form class="box" action="login_sec.php" method="POST">
  <div class="field">
    <label class="label">Email</label>
    <div class="control">
      <input class="input" type="email" placeholder="Enter your email id" name="email">
    </div>
  </div>

  <div class="field">
    <label class="label">Password</label>
    <div class="control">
      <input class="input" type="password" placeholder="********" id="mypass" name="password">
    </div>
  </div>
  <label class="checkbox">
  <input type="checkbox" onclick="myFunction()">
  Show Password
  </label>
  <div class="field is-grouped is-grouped-centered">
  <p class="control">
    <input type="submit" class="button is-dark" value="submit">
  </p>
  <p class="control">
    <a class="button is-light">
      Reset
    </a>
  </p>
</div>

</form>

</div>
<?php include ("footer.php");?>

<?php
        include ("conn.php");
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = mysqli_real_escape_string($db,$_POST['email']);
                $password = mysqli_real_escape_string($db,$_POST['password']); 
                
                $sql = "SELECT userid FROM users WHERE username = \"$email\" and password = \"$password\" and usertype=\"security guard\"";
                $result = mysqli_query($db,$sql);
                if(mysqli_num_rows($result)== 1) {
                    $_SESSION['login_user'] = $email;
                    header("location: index_sec.php");
                }else {
                    echo '<script>alert("Your Login Name or Password is invalid")</script>';
                }
            
            }
        
?>

</body>
</html>
<script>
    function myFunction() {
  var x = document.getElementById("mypass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>