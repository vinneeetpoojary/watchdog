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

<table class="table is-bordered is-striped  is-hoverable">
  <thead>
    <tr>
      <th><abbr title=" visitors Fullname">Fullname</abbr></th>
      <th><abbr title="Visitor Phone no">Phone no</abbr></th>
      <th><abbr title="Visiting wing ">Wing</abbr></th>
      <th><abbr title="Visiting room  no">Room no.</abbr></th>
       <th><abbr title="Reason">Reason</abbr></th>
      <th><abbr title="time in">Time in</abbr></th>
      <th><abbr title="time out">Time out</abbr></th>
      </tr>
      </thead>
       <tfoot>
  <tbody>    
<?php 
include ("conn.php");

$sql = "SELECT visitorsdata.vfullname,visitorsdata.vphoneno,visitorsrecord.vwing,visitorsrecord.vroomno,visitorsrecord.vtimein,visitorsrecord.vtimeout,visitorsrecord.vreason FROM  visitorsdata
  INNER JOIN visitorsrecord on visitorsrecord.vuserid=visitorsdata.vuserid";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo "</tfoot><tr>";
echo "<td>" . $row['vfullname'] . "</td>";
echo "<td>" . $row['vphoneno'] . "</td>";
echo "<td>" . $row['vwing'] . "</td>";
echo "<td>" . $row['vroomno'] . "</td>";
echo "<td>" . $row['vreason'] . "</td>";
echo "<td>" . $row['vtimein'] . "</td>";
echo "<td>" . $row['vtimeout']  ."</td>" ;
echo"<td>"."<form method=\"post\" action=\"visitorstable\">"."<input type=\"submit\" class=\"button is-danger\" value=\"Exited Now\">"."</td>";
}

$vfullname=$row[0];

?>

</table>
  </div>
  </div>

</div>
</div>
</div>

<?php include ("footer.php");?>
</body>
</html>