<?php
$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "mycontacts";
    
    $id = htmlspecialchars($_GET["id"]);
	
	//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    
    $sql="select * from mycontacts where id=$id";
    //echo "[".$sql."]";
    $result = $conn->query($sql);

    if($result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()){
           echo '
           <form action="insertion.php?action=update&id='. $row['id'] . '" method="POST">
           <table>
               <tr>
                   <td>Name :</td>
                   <td><input type="text" name="username" value="' . $row['name'] . '"></td>
               </tr>
               <tr>
                   <td>Address :</td>
                   <td><input type="Address" name="Address" value="' . $row['Address'] . '" ></td>
               </tr>
               <tr>
                   <td>Gender :</td>
                   <td>
                   <input type="radio" name="gender" value="m"  '. (($row['gender'] == 'm') ? "checked" : "") . '>Male
                   <input type="radio" name="gender" value="f"  '. (($row['gender'] == 'f') ? "checked" : "") . '>Female
                   </td>
               </tr>
               <tr>
                   <td>Email :</td>
                   <td><input type="email" name="email" value=' . $row['email'] . ' ></td>
               </tr>
               <tr>
                   <td>Phone :</td>
                   <td>
                   <select name="PhoneCode" value="' . $row['phonecode'] . '" >
                   <option selected hidden value="">Select Code</option> 
                   <option value="061" '. (($row['phonecode'] == '061') ? "selected" : "") . ' >061</option>
                   <option value="977 '. (($row['phonecode'] == '977') ? "selected" : "") . '">977</option>
                   <option value="978" '. (($row['phonecode'] == '978') ? "selected" : "") . '>978</option>
                   <option value="945" '. (($row['phonecode'] == '945') ? "selected" : "") . '>945</option>
                   <option value="876" '. (($row['phonecode'] == '876') ? "selected" : "") . '>876</option>
                   <option value="001"   '. (($row['phonecode'] == '001') ? "selected" : "") . '>001</option>
                   </select>
                   <input type="phone" name="phone" value=' . $row['phone'] . ' >
                   </td>
               </tr>
               <tr>
                   <td><input type="submit" value="Update"></td>
               </tr>
           </table>
       </form>';
        }
    }