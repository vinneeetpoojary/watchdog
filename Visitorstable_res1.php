<?php
session_start();
if(!isset($_SESSION['login_user'])){
  header("location:index.php");
}?>
<html>
<head><title></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
<link rel="stylesheet" href="stylesheet/stylesheet.css">
<link href="js/js.js">
</head>
<body>

<?PHP include "header.php";?>
<?php include ("navbar_logined.php");?>

<div class="hero-image">
<div class="columns">
  <div class="column is-one-thirds">
<?php include("menu_res.php");?>
  </div>
  <div class="column is-four-fifths">
 <table class="table is-bordered is-striped  is-hoverable">
  <thead>
    <tr>
      <th><abbr title=" visitors Fullname">Fullname</abbr></th>
      <th><abbr title="Visitor Phone no">Phone no</abbr></th>
       <th><abbr title="Reason">Reason</abbr></th>
      <th><abbr title="time in">Time in</abbr></th>
      <th><abbr title="time out">Time out</abbr></th>
      </tr>
      </thead>
       <tfoot>
  <tbody>
      
<?php 
include ("conn.php");
$emailid=$_SESSION['login_user'];
$query = "SELECT rroomno,rwing FROM residentsdata WHERE remailid=\"$emailid\"";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$roomno=$row['rroomno'];
$wing=$row['rwing'];

$sql = "SELECT visitorsdata.vfullname,visitorsdata.vphoneno,visitorsrecord.vtimein,visitorsrecord.vtimeout,visitorsrecord.vreason FROM  visitorsdata
  INNER JOIN visitorsrecord on visitorsrecord.vuserid=visitorsdata.vuserid  WHERE visitorsrecord.vroomno='$roomno' and visitorsrecord.vwing='$wing'";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo "</tfoot><tr>";
echo "<td>" . $row['vfullname'] . "</td>";
echo "<td>" . $row['vphoneno'] . "</td>";
echo "<td>" . $row['vreason'] . "</td>";
echo "<td>" . $row['vtimein'] . "</td>";
echo "<td>" . $row['vtimeout'] . "</td>";
echo "</tr><tfoot>";
}
?>
</table>
  
  </div>
  </div>
  </div>
</body></html>
<?PHP include ("footer.php");?>