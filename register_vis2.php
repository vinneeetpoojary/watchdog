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
<?php include("menu_sec.php");?>
</div>
<div class="column is-four-fifths">
<form class="box" action="register_vis2.php" method="post">
<div class="field">
  <label class="label">Visitors Address</label>
  <div class="control">
    <textarea class="textarea" placeholder="Enter Address" name="address"></textarea>
  </div>
</div>
<div class="field">
  <label class="label">Visitors Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input " type="email" placeholder="Enter your Email " value="" name="emailid">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <input type="submit"button class="button is-dark" value="submit" id="datetime()"></button>
  </div>
  <div class="control">
    <input type="reset"button class="button is-link is-light"></button>
  </div>
</div>
</form>
  
</div>
</div>
</div>

<?php include ("footer.php");?>
</body>
</html>

<?php
include ("conn.php");
          $phoneno= $_SESSION['visitorphoneno'];
         $fullname= $_SESSION['visitorfullname'];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email=mysqli_real_escape_string($db,$_POST['emailid']);
            $address=mysqli_real_escape_string($db,$_POST['address']);
           
         $sql = "INSERT INTO visitorsdata (vuserid,vfullname,vemailid,vphoneno,vaddress)
         VALUES (null,'$fullname','$email','$phoneno','$address')";
         $result=mysqli_query($db,$sql);
         header("location:visitorsform.php");
      }

?>