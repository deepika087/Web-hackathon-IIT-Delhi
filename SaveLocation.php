<?php 
$mysqli = new mysqli('localhost', 'root', '', 'webhackathon');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($_POST["submit"])
{
	if (isset($_POST['id'])) {
		$sql = "Insert into user_locations values ('$_POST[id]', '$_POST[latitude]', '$_POST[langitude]')";
	} else {
		$sql = "Insert into user_locations values (null, '$_POST[latitude]', '$_POST[langitude]')";	
	}
	/* execute prepared statement */
	if ($mysqli->query($sql) === FALSE) 
	{
		printf("Error: %s\n", $mysqli->error);
		include('/index.php');
	} else {
		echo '<script language="javascript">';
		echo 'alert("Location saved successfully")';
		echo '</script>';
		include('/index.php');
	}
} ?>




