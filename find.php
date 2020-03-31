<?php

$search =( ($_GET['username']) || ($_GET['address']) || ($_GET['phone'] ) )
$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "mycontacts";
	
	
	//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    
    $sql="select * from mycontacts where name LIKE '%$search%'";
    //echo "[".$sql."]";
    $result = $conn->query($sql);

    if($result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()){
            echo "Name:" . $row['name'] . "<br/>";
            echo "Address:" . $row['Address'] . "<br/>";
            echo "Gender:" . $row['gender'] . "<br/>";
            echo "Phone Code:" . $row['phonecode'] . "<br/>";
            echo "Phone:" . $row['phone'] . "<br/>";
            echo "Thank you for your enquiry" . "<br />";
        }
    }