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
$CATEGORY=$_POST['CATEGORY']; 
$SID=$_POST['SID']; 
$COST=$_POST['COST'];
$NUMBER=$_POST['NUMBER'];
$sql ="INSERT INTO product(PNAME,PCATEGORY,SID,PCOST,PNOOFITEMS) VALUES ('$NAME','$CATEGORY','$SID','$COST','$NUMBER')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo strip_tags("Go back to Display all supplier members");
mysqli_close($conn);
  ?>
