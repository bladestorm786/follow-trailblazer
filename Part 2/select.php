<?php
session_start();
if (!isset($_SESSION['username']))
{
  header('location: login.php');
}

//including the database connection file
include_once("config.php");
include("search.php");
$id = $_GET['id'];
$myselection="SELECT * FROM Media_Appearance WHERE Public_Fig =$id";

$result = mysqli_query($mysqli,$myselection);



 // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Programme Name</td>
		<td>Company Name</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['First_Name']."</td>";
		echo "<td>".$res['Last_Name']."</td>";
		echo "<td>".$res['Programme_Name']."</td>";
		echo "<td>".$res['Company_Name']."</td>";
	}
	?>
	</table>


</body>
</html>
