<?php
// including the database connection file
error_reporting(E_ALL ^ E_NOTICE);

include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, strip_tags($_POST['id']));

	$firstname = mysqli_real_escape_string($mysqli, strip_tags($_POST['First_Name']));
	$lastname = mysqli_real_escape_string($mysqli, strip_tags($_POST['Last_Name']));
	$occupation= mysqli_real_escape_string($mysqli, strip_tags($_POST['Occupation']));
	$publicfigureprofile = mysqli_real_escape_string($mysqli, strip_tags($_POST['Public_Figure_Profile']));
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($occupation)| empty($publicfigureprofile)) {

		if(empty($firstname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}

		if(empty($lastname)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}

		if(empty($occupation)) {
			echo "<font color='red'>Programme Name field is empty.</font><br/>";

		}

		if(empty($publicfigureprofile)) {
			echo "<font color='red'>Company Name field is empty.</font><br/>";

		}
	} else {
		//updating the table
		$result = $mysqli->prepare("UPDATE Public_Figure SET First_Name=?, Last_Name=?, Occupation=?, Public_Figure_Profile=? WHERE Public_Figure_ID=?");
		$result->bind_param('ssssi', $firstname, $lastname, $occupation, $publicfigureprofile, $id);
    $result->execute();
		//redirectig to the display page. In our case, it is index.php
		header("Location: indexlogin.php");
	}
}
?>

<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>First Name</td>
				<td><input type="text" name="First_Name" value="<?php echo $firstname;?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="Last_Name" value="<?php echo $lastname;?>"></td>
			</tr>
			<tr>
				<td>Programme Name</td>
				<td><input type="text" name="Occupation" value="<?php echo $occupation;?>"></td>
			</tr>
			<tr>
				<td>Company Name</td>
				<td><input type="text" name="Public_Figure_Profile" value="<?php echo $publicfigureprofile;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
