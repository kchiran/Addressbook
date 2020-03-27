<?php
$username = $_POST['username'];
$address= $_POST['Address'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$phonecode= $_POST['PhoneCode'];
$phone= $_POST['phone'];
$action = htmlspecialchars($_GET['action']);
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($username) && !empty($address) && !empty($gender) && !empty($email) && !empty($phonecode) && !empty($phone))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "mycontacts";
	
	
	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
	}else {
		$sql="select email from mycontacts where email='$email' ";
		//echo "[".$sql."]";
		$result = $conn->query($sql);
		if($action == 'update') {
			$sql = "UPDATE mycontacts SET ". "name='$username', Address='$address', gender='$gender', phonecode=$phonecode, phone=$phone". " WHERE id=$id";
		} else {
			$sql="insert into mycontacts (name, address, gender, email, phonecode, phone) ";
			$sql.="values ('$username', '$address', '$gender', '$email', '$phonecode', '$phone')";
			
		}
		//echo $result."]";
		if ($result->num_rows > 0 && $action == 'insert') {
			echo "the email already exists";
		}else{
			$result=$conn->query($sql) or die(mysqli_error($conn));

			if($result){
				
				echo "record added successfully";
			}else{
				echo "Err in sql[".$sql."]";
			}
		}
		/*$select = "select email from register where email = ? Limit 1";
		$insert = "insert into register (username, address, gender, email, phonecode, phone) values(?,?,?,?,?,?)";
		
		//prepare statement
		$stmt = $conn->prepare($select);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		if ($rnum==0) {
			$stmt->close();
			
			$stmt = $conn->prepare($insert);
			$stmt->bind_param("ssssii", $username, $address, $gender, $email, $phonecode, $phone);
			$stmt->execute();
			echo "New Record Inserted Succesfully";
		}else {
			echo "Someone already registered using this email";
		}*/
		//$stmt->close();
		//$stmt->close();
		//$conn->close();
	}
	
	
	
}
else 
{
	echo "All field are required";
	die();
}	
?>