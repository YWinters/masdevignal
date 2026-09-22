<?php
//$servername = "masdevignal.be.mysql";

//one.com
/*$servername = "localhost";
$username = "masdevignal_be";
$password = "DbFkC6wz";*/

//local
/*$servername = "localhost";
$username = "root";
$password = "root";*/

//versio
$servername = "10.3.1.227";
$username = "yannifh192_mdv";
$password = "DbFkC6wz";


// Create connection
//$conn = new mysqli($servername, $username, $password, "masdevignal_be"); //online
$conn = new mysqli($servername, $username, $password, "yannifh192_mdv");
//$conn = new mysqli($servername, $username, $password, "vignal"); //local
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//$conn->select_db("masdevignal_be");

?>