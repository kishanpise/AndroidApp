<?php
 
/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['ID']) && isset($_POST['Date']) && isset($_POST['Time']) && ($_POST['StartupName']) &&($_POST['Email']) &&($_POST['Slotnumber']) ) {
 
    $ID = $_POST['ID'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
	$StartupName = $_POST['StartupName'];
	$Email = $_POST['Email'];
	$Slotnumber = $_POST['Slotnumber'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql update row with matched pid
    $result = mysql_query("UPDATE add_slot SET Date = '$Date', Time = '$Time', StartupName = '$StartupName', Email = '$Email' Slotnumber = '$Slotnumber' WHERE ID = $ID");
 
    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "slot successfully updated.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>