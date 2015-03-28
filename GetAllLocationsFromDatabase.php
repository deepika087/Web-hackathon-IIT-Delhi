<?php 
$mysqli = new mysqli('localhost', 'root', '', 'webhackathon');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Query to get all the locations from the database
$sql = "select * from user_locations ";

$result = $mysqli->query($sql);
class LatLangObject {
	public $userId = "";
	public $lat = "";
	public $lang = "";
}
$resultList = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$locationObject = new LatLangObject();
	$locationObject->userId = $row['id'];
	$locationObject->lat = $row['lat'];
	$locationObject->lang = $row['lng'];

	array_push($resultList, $locationObject);
}

$someJSON = json_encode($resultList);
 echo $someJSON;
//echo  {"a": "1"};
//json_encode($resultList);
?>