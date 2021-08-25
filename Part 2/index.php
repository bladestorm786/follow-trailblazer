<?php

//including the database connection file
include_once("config.php");
include("search.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Media_Appearance ORDER BY Media_Appearance_ID DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>

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

  <a href="login.php">Login</a>
  <a href="registrationprocess.php">Register</a>


</body>
</html>
