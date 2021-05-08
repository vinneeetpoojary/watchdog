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

<form class="box" action="register_vis.php" method="post">
<div class="field">
  <label class="label">Visitors Full Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Enter your full name" name="fullname">
  </div>
</div>
<div class="field">
  <label class="label">Visitors Contact Number</label>
  <div class="control">
    <input class="input " type="tel" placeholder="Enter your Contact number" name="phoneno">
    <span class="icon is-small is-left">
      <i class="fas fa-phone"></i>
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
include("conn.php");
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullname=mysqli_real_escape_string($db,$_POST['fullname']);
      $phoneno=mysqli_real_escape_string($db,$_POST['phoneno']);
      $sql = "SELECT vuserid FROM visitorsdata WHERE vfullname=\"$fullname\" and vphoneno=\"$phoneno\"";
      $result = mysqli_query($db, $sql);
         if (mysqli_num_rows($result) == 0){
                 $_SESSION['visitorfullname']=$fullname;
                 $_SESSION['visitorphoneno']=$phoneno;
                 header("location:register_vis2.php");
          }elseif(mysqli_num_rows($result) == 1){
                 $_SESSION['visitorfullname']=$fullname;
                 $_SESSION['visitorphoneno']=$phoneno;
                 header("location:visitorsform.php");
                 $userid=mysqli_fetch_row('vuserid');
                 $_SESSION['visitorsuserid']=$userid;
                 }
}
?>