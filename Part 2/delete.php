<?php
include_once("config.php");

// Create connection
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
$id = mysqli_real_escape_string($mysqli, strip_tags($_GET['id']));

// sql to delete a record
$sql = "DELETE FROM Public_Figure WHERE Public_Figure_ID=$id";

if ($mysqli->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $mysqli->error;
}

$mysqli->close();
?>
