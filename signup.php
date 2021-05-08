<?php 
session_start();
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}
?>
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
<?php include ("navbar_logined.php");?>

<div class="hero-image">
<div class="columns">
<div class="column is-one-thirds">
<?php include("menu_man.php");?>
</div>
<div class="column is-four-fifths">

<form class="box" action="signup.php" method="post">
  <div class="field">
    <label class="label">Email ID</label>
    <div class="control">
      <input class="input" type="text" placeholder="Enter your Email id" name="email">
    </div>
  </div>
  <div class="field">
    <label class="label">Password</label>
    <div class="control">
      <input class="input" type="password" placeholder="********" name="password">
    </div>
  </div>
  <div class="field">
    <label class="label">Confirm Password</label>
    <div class="control">
      <input class="input" type="password" placeholder="********" name="cnfpassword">
    </div>
  </div>
  <div class="field">
  <label class="label">Select usertype</label>
  <div class="control">
    <div class="select">
      <select name="usertype">
       <option value="admin">admin</option>
        <option value="resident">resident</option>
        <option value="security guard">security guard</option>
        <option value="visitor">visitor</option>
      </select>
    </div>
  </div>
</div>
  <input type="submit"button class="button is-dark" value="submit"></button>
  <input type="reset" button class="button is-light"></button>
</form>

</div>
</div>
</div>

<?php include ("footer.php");?>
</body>
</html>

<?php
include ("conn.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $usertype=mysqli_real_escape_string($db,$_POST["usertype"]);
      
      if(empty($email && $password)){
          echo '<script>alert("please insert values")</script>';
          }else{
               $sql = "INSERT INTO users (userid,username,password,usertype) VALUES (NULL, \"$email\", \"$password\", \"$usertype\")";
                $result = mysqli_query($db,$sql);
                echo '<script>alert("Values inserted ")</script>';
                header("location:register_res.php");
             }
          }
   $db->close();
?>