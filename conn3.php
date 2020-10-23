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
 

$ID=$_POST['ID']; 
$NAME=$_POST['NAME']; 
$NUMBER=$_POST['NUMBER'];
$EMAIL=$_POST['EMAIL']; 
$DOB=$_POST['DOB']; 
$ADDRESS=$_POST['ADDRESS'];
$TYPE=$_POST['TYPE'];
$sql ="INSERT INTO customer(ID,NAME,NUMBER,EMAIL,DOB,ADDRESS,TYPE) VALUES ('$ID','$NAME','$NUMBER','$EMAIL','$DOB','$ADDRESS','$TYPE')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo strip_tags("Go back to Display all CUSTOMERS");
mysqli_close($conn);
  ?>
