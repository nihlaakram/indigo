<?php 
// get the q parameter from URL
$q = $_GET['q'];

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "indigo";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());

	}

 $bs ="update requests set status=\"1\" where btnID=".$q;
   if ($conn->query($bs) === TRUE) {
    //echo "Record updated successfully";
   } else {
    //echo "Error updating record: " . $conn->error;    
   }
    $conn->close();

?>