<!DOCTYPE html>
<?php

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "indigo";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
        echo "<script>
                alert(\"Connection Error to db\");
              </script>";

	}

    echo "<html>";
	echo "<head>";
	echo "<meta charset=\"utf-8\">";
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
	echo "<meta http-equiv=\"refresh\" content=\"2; URL=http://localhost:80/shaks/indigo/index.php\">";
	echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\">";
    //echo "<script src=\"ajax.js\"></script>";
    echo "<script src=\"jquery-3.1.1.min.js\"></script>";
	echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>";
	echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>";
	echo "<script src=\"https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js\"></script>";
	echo "<script language=\"javascript\" type=\"text/javascript\">";

    echo "function test(tableNo) {
    tableNo = encodeURIComponent(tableNo.trim());
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4&&xmlhttp.status==200) {
                //alert(\"somewhere\");
        }
    };
    xmlhttp.open(\"GET\", \"test.php?q=\"+tableNo, true);
    xmlhttp.send(null);
    }";

    echo "</script>";
	echo "</head>";
    echo "<body>";

    echo "<div class=\"row\">";

	echo "<div class=\"col-sm-2\">";
	echo "</div>";

	echo "<div class=\"col-sm-8\">";
	echo "<h1>Flaming Indigo : TGIF</h1>";
	echo "<br/>";


	$sql = "SELECT * FROM requests where status=0";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
	
		echo "<div class=\"container-fluid\" id=\"display_content\"><div class=\"row\"><div class=\"col-sm-9\"><br><h5>";
		echo  $row["tableName"]; 
		echo "<br><h5>";
		echo $row["time"];	
		echo "<br><br></div><div class=\"col-sm-3\" >";
		echo "<br><button onclick=\"test('".$row["tableName"]."')\" type=\"button\" class=\"btn btn-primary btn-lg active\" id=\"attended\" ><span class=\"glyphicon glyphicon-ok\"></span></button>";	
		echo "</div></div></div><br>";
		echo "";
		echo "";
		}
	} else {
		echo "0 results";
	}
	$conn->close();



	echo "<div class=\"col-sm-2\">";
	echo "</div>";
    echo "</div>";
    echo "</body>";
    echo "</html>";

?>
