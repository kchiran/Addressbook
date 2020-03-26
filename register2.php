<!DOCTYPE HTMl>
<html>
    <head>
        <title>Register Form</title>
    </head>
    <body>
        <form action="insertion.php?action=insert" method="POST">
            <table>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><input type="Address" name="Address" ></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                    <input type="radio" name="gender" value="m">Male
                    <input type="radio" name="gender" value="f">Female
                    </td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    <td>
                    <select name="PhoneCode">
                    <option selected hidden value="">Select Code</option>
                    <option value="061">061</option>
                    <option value="977">977</option>
                    <option value="978">978</option>
                    <option value="945">945</option>
                    <option value="876">876</option>
                    <option value="001">001</option>
                    </select>
                    <input type="phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="GET">
            <input type="text" name="username">
            <input type="submit" value="Search">     
        </form>
    </body>
</html>
<?php

if(!empty($_GET['username'])) {
 $search = $_GET['username'];

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
        echo "<p> Your results for <b> name " . $search . "</b> are </p>";
        while($row = $result->fetch_assoc()){
            echo "Name:" . $row['name'] . "<br/>";
            echo "Address:" . $row['Address'] . "<br/>";
            echo "Gender:" . $row['gender'] . "<br/>";
            echo "Phone Code:" . $row['phonecode'] . "<br/>";
            echo "Phone:" . $row['phone'] . "<br/><br />";
            echo '<a class="button" href="edit.php?id='. $row['id'] .'">Edit</a><br />';
            
            echo "-------------------------------- <br />";
        }
    }

    $conn->close();
}
