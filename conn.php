<?php
$servername = "localhost";
$database = "supermarket";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 


$NAME=$_POST['NAME']; 
$QUALIFICATION=$_POST['QUALIFICATION'];
$NUMBER=$_POST['NUMBER']; 
$EMAIL=$_POST['EMAIL']; 
$TYPE=$_POST['TYPE'];
$ADDRESS=$_POST['ADDRESS']; 
$SALARY=$_POST['SALARY']; 
$COMMENT=$_POST['COMMENT'];

$sql ="INSERT INTO staff(NAME,QUALIFICATION,NUMBER,EMAIL,TYPE,ADDRESS,COMMENT,SALARY) VALUES ('$NAME','$QUALIFICATION','$NUMBER','$EMAIL','$TYPE','$ADDRESS','$COMMENT','$SALARY')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo strip_tags("Go back to Display all staff members");
mysqli_close($conn);
  ?>
