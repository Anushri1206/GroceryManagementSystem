<?php
$servername = "localhost";
$database = "supermarket";
$username = "root";
$password = "";

// Create connection

$connect = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
}
 

$ID=$_POST['ID']; 
$SID=$_POST['SID'];  
$PNAME=$_POST['NAME'];
$PNO=$_POST['PNO']; 
$result=mysqli_query($connect,"SET @p2=$PNO");
$result=mysqli_query($connect,"SET @p3='$PNAME';");
$result=mysqli_query($connect,"CALL `get_cost`(@p0, @p1, @p2,@p3);");
$result=mysqli_query($connect,"SELECT @p1 AS TOTALCOST,@p0 AS ID;");
while($row=mysqli_fetch_array($result))
{$TOTALCOST=$row['TOTALCOST'];
$PID=$row['ID'];	
}

$sql ="INSERT INTO newsupply(ID,SID,PID,PNAME,PNOOFITEMS,TOTCOST) VALUES ('$ID','$SID','$PID','$PNAME','$PNO','$TOTALCOST')";
if ($connect->query($sql) === TRUE) {
$sql1="UPDATE product
   SET PNOOFITEMS = PNOOFITEMS + $PNO
 WHERE PID = $PID";
if ($connect->query($sql1) === TRUE){
    echo "New record created successfully";
}} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

echo strip_tags("Go back to Display all supplier members");
mysqli_close($connect);
  ?>
