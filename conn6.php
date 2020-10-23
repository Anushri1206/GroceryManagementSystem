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
$ATTRIBUTE=$_POST['ATTRIBUTE'];
$VALUE=$_POST['VALUE']; 

$sql ="UPDATE customer SET $ATTRIBUTE='$VALUE' WHERE ID=$ID";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo strip_tags("Go back to Display all CUSTOMERS");
mysqli_close($conn);
  ?>
