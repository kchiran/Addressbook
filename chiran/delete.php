<?php 
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "mycontacts";

$id = htmlspecialchars($_GET["id"]);

//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
// Check Connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

//sql to delete a record
$sql = "delete from mycontacts where id=$id";

if ($conn->query($sql)===true) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting the record: " . $conn->error;
}

$conn->close();
?>
