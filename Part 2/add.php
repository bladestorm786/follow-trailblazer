<?php
include_once("config.php");


// prepare the query
if ($query = $mysqli->prepare("INSERT INTO `Public_Figure` (`First_Name`, `Last_Name`, `Occupation`, `Public_Figure_Profile`)
  VALUES (?, ?, ?, ?)")) {
	$firstname = mysqli_real_escape_string($mysqli, strip_tags($_POST['First_Name']));
	$lastname = mysqli_real_escape_string($mysqli, strip_tags($_POST['Last_Name']));
	$occupation= mysqli_real_escape_string($mysqli, strip_tags($_POST['Occupation']));
	$publicfigureprofile = mysqli_real_escape_string($mysqli, strip_tags($_POST['Public_Figure_Profile']));


  // set the parameters to substitute for the ? in the query above
  $query->bind_param('ssss', $firstname, $lastname, $occupation, $publicfigureprofile);

  // run the query
  $query->execute();

  // check the query was successful
  if ($query->affected_rows > 0) {
		header("location: indexlogin.php");
  }

// check for any db query errors
} else {
  echo "SQL Error: " . $mysqli->error;
}

?>
