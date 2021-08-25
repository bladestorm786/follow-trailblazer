<?php


session_start();


if (!isset($_SESSION['username']))
{
  header('location: login.php');
}

//including the database connection file
include_once("config.php");
include("search.php");

$result = mysqli_query($mysqli, "SELECT * FROM Public_Figure ORDER BY Public_Figure_ID DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>
<a href="publicfigureprofile.php">Your Selections</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Occupation</td>
		<td>Public_Figure_Profile</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['First_Name']."</td>";
		echo "<td>".$res['Last_Name']."</td>";
		echo "<td>".$res['Occupation']."</td>";
		echo "<td>".$res['Public_Figure_Profile']."</td>";
		echo "<td><a href=\"edit.php?id=$res[Public_Figure_ID]\">Edit</a> | <a href=\"delete.php?id=$res[Public_Figure_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>


</body>
</html>
