<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
<form action="" method="post">
Search: <input type="text" name="term" /><br />
<input type="submit" value="Submit" />
</form>
<?php
if (!empty($_REQUEST['term'])) {
//Using Superglobal to submit forms
$term = mysqli_real_escape_string($mysqli, $_REQUEST['term']);
//This variable is SELECT statement
$sql = "SELECT * FROM Public_Figure WHERE First_Name LIKE '%".$term."%'";


//executes query function
$r_query = mysqli_query($mysqli, $sql);


//Table output
while ($row = mysqli_fetch_array($r_query)){
  echo "<table width='80%' border=0>

  	<tr bgcolor='#CCCCCC'>
  		<td>First Name</td>
  		<td>Last Name</td>
  		<td>Occupation</td>
  		<td>Public_Figure_Profile</td>
  	</tr><br>";
   echo "<td> " . $row['First_Name'] ."</td>";
   echo "<td> " . $row['Last_Name'] . "</td>";
   echo "<td> " . $row['Occupation'] . "</td>";
   echo "<td> " . $row['Public_Figure_Profile'] . "</td>";

   echo "</br>";

}

}
?>
    </body>
</html>
