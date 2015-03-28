<?php
$mysqli = new mysqli("localhost", "root", "", "webhackathon");

$sql = "CREATE TABLE user_locations
	(
		id integer Primary key AUTO_INCREMENT ,
		lat FLOAT( 10, 6 ) NOT NULL,
		lng FLOAT( 10, 6 ) NOT NULL 
	)";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query($sql) === TRUE) {
    printf("Table items successfully created.\n");
} else { 
	printf("Error: %s\n", $mysqli->error); 
}
?>