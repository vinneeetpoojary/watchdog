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
<?php include("menu_res.php");?>
</div>
<div class="column is-four-fifths">

<table class="table is-bordered is-striped  is-hoverable">
  <thead>
    <tr>
      <th><abbr title="Residents Fullname">Fullname</abbr></th>
      <th><abbr title=" Phone no">Phone no</abbr></th>
       <th><abbr title="Email ID">Email ID</abbr></th>
      <th><abbr title="Wing">Wing</abbr></th>
      <th><abbr title="Room no">Room no</abbr></th>
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

$sql = "SELECT * from residentsdata  WHERE rroomno='$roomno' and rwing='$wing'";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo "</tfoot><tr>";
echo "<td>" . $row['rfullname'] . "</td>";
echo "<td>" . $row['rphoneno'] . "</td>";
echo "<td>" . $row['remailid'] . "</td>";
echo "<td>" . $row['rwing'] . "</td>";
echo "<td>" . $row['rroomno'] . "</td>";
echo "</tr><tfoot>";
}
?>
</table>
  
  
</div>
</div>
</div>

<?php include ("footer.php");?>
</body>
</html>