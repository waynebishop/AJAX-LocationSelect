<?php

// Connect to database
$dbc = new mysqli('localhost', 'root', '', 'Ajax-Location');

$CountryID = $dbc->real_escape_string($_GET['CountryID']);

$sql = "SELECT CityName, CityID FROM Cities WHERE CountryID = $CountryID";

// Run the SQL
$result = $dbc->query($sql);

if ($result->num_rows > 0 ) {

	// extract the results and convert to json
	$cities = json_encode( $result->fetch_all(MYSQLI_ASSOC));

	// Prepare the header to say we are about to send JSON, not text
	header('Content-Type: application/json');

	echo $cities;


} else {

	echo "error";

}








