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
$ADDRESS=$_POST['ADDRESS']; 
$PID=$_POST['PRODUCT']; 
$COMMENT=$_POST['COMMENT'];
$NUMBER=$_POST['NUMBER'];
$sql ="INSERT INTO supplier(SID,SNAME,SADDRESS,PRODUCT,SCOMMENT,SNUMBER) VALUES ('$ID','$NAME','$ADDRESS','$PID','$COMMENT','$NUMBER')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo strip_tags("Go back to Display all supplier members");
mysqli_close($conn);
  ?>
