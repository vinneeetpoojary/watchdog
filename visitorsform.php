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

<form class="box" action="visitorsform.php" method="post"><div class="field">
  <label class="label">Visitors reason</label>
  <div class="control">
    <input class="input " type="tel" placeholder="Visitors reason" name="reason">
    <span class="icon is-small is-left">
      <i class="fas fa-phone"></i>
    </span>
  </div>
</div>
<div class="field">
  <label class="label">Select your wing to visit</label>
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
  <label class="label">Select your room no to visit</label>
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
             $sql = "SELECT vuserid FROM visitorsdata 
             WHERE vfullname=\"$fullname\" and vphoneno=\"$phoneno\"";
             $result = mysqli_query($db, $sql);
             $row=mysqli_fetch_row($result);
             $userid=$row[0];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
            $reason=mysqli_real_escape_string($db,$_POST['reason']);
            $wing=mysqli_real_escape_string($db,$_POST['wing']);
            $roomno=mysqli_real_escape_string($db,$_POST['roomno']);
            date_default_timezone_set("Asia/Kolkata");
            $timein = date("Y-m-d h:i:sa");
            $timeout= ("");
         $sql = "INSERT INTO visitorsrecord (vuserid,vwing,vroomno,vtimein,vtimeout,vreason)
          VALUES ($userid,'$wing','$roomno','$timein','$timeout','$reason')";
         $result=mysqli_query($db,$sql);
         echo ("<script>alert(\"new visitor record added\")</script>");
      }
      mysqli_close($db);
    ?>


