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

<form class="box" action="register_res.php" method="post">
<div class="field">
  <label class="label">Full Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Enter your full name" name="fullname">
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input " type="email" placeholder="Enter your Email " value="" name="emailid">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
  </div>
</div>
<div class="field">
  <label class="label">Contact Number</label>
  <div class="control">
    <input class="input " type="tel" placeholder="Enter your Contact number" name="phoneno">
    <span class="icon is-small is-left">
      <i class="fas fa-phone"></i>
    </span>
  </div>
</div>
<div class="field">
  <label class="label">Select your wing</label>
  <div class="control">
    <div class="select">
      <select name="wing">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
        <option value="d">D</option>
        <option value="e">E</option>
      </select>
    </div>
  </div>
</div>
<div class="field">
  <label class="label">Select your room no</label>
  <div class="control">
    <div class="select">
      <select name="roomno">
        <option value="101">101</option>
        <option value="102">102</option>
        <option value="103">103</option>
        <option value="201">201</option>
        <option value="202">202</option>
        <option value="203">203</option>
        <option value="301">301</option>
        <option value="302">302</option>
        <option value="303">303</option>
      </select>
    </div>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <input type="submit"button class="button is-dark" value="submit"></button>
  </div>
  <div class="control">
    <input type="reset"button class="button is-link is-light"></button>
  </div>
</div>
</form>

</div>
</div>
</div>
</div>

<?php include ("footer.php");?>
</body>
</html>

<?php
include("conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myfullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $myemail = mysqli_real_escape_string($db,$_POST['emailid']); 
    $myphoneno = mysqli_real_escape_string($db,$_POST['phoneno']);
    $mywing=mysqli_real_escape_string($db,$_POST["wing"]);
    $myroomno = mysqli_real_escape_string($db,$_POST['roomno']);

    if(!empty($myfullname && $myroomno && $mywing && $myemail && $myphoneno)){
       $sql = "INSERT INTO residentsdata (ruserid,rfullname,remailid,rphoneno,rwing,rroomno) 
       VALUES (null,\"$myfullname\",\"$myemail\",\"$myphoneno\", \"$mywing\", \"$myroomno\")";
            $result = mysqli_query($db,$sql);
            echo "<script>alert(\"value inserted\")</script>";
        }else{
             echo "<script>alert(\"please insert values\")</script>";
        }
      }
 $db->close();
?>
