<?php 
$mysqli = new mysqli('localhost', 'root', '', 'webhackathon');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

startlat = $_POST['startlat'];
startlng = $_POST['startlng'];
radius = $_POST['radius'];

$sql = "SELECT latitude, longitude, SQRT(
    POW(69.1 * (latitude - [" + $startlat + "]), 2) +
    POW(69.1 * ([" + startlng + "] - longitude) * COS(latitude / 57.3), 2)) AS distance
FROM TableName HAVING distance < " + $radius + "ORDER BY distance ";

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
?>