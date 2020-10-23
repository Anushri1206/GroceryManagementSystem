<html>
<head> 
<title>Supplier Management</title>

<link rel="stylesheet" type="text/css" href="C1.css" />
        
  </head> 

<body>
<?php
 //create connection
 $connect=mysqli_connect('localhost','root','','supermarket');
	
//check connection
 if(mysqli_connect_errno($connect))
 {
	echo 'Failed to connect to database: '.mysqli_connect_error();
}
else
	echo 'Connected Successfully!!';

$PNAME=$_POST['NAME'];
$QTY=$_POST['QTY'];
$CID=$_POST['CID'];
$result=mysqli_query($connect,"SET @p2=$QTY");
$result=mysqli_query($connect,"SET @p3='$PNAME';");
$result=mysqli_query($connect,"CALL `get_cost`(@p0, @p1, @p2,@p3);");
$result=mysqli_query($connect,"SELECT @p1 AS TOTALCOST,@p0 AS ID;");
while($row=mysqli_fetch_array($result))
{$TOTALCOST=$row['TOTALCOST'];
$PID=$row['ID'];	
}
$sql ="INSERT INTO dailytransaction(PID,QTY,PNAME,TOTCOST,CID) VALUES ('$PID','$QTY','$PNAME','$TOTALCOST','$CID')";
if ($connect->query($sql) === TRUE) {
$sql1="UPDATE product
   SET PNOOFITEMS = PNOOFITEMS - $QTY
 WHERE PID = $PID";
if ($connect->query($sql1) === TRUE){
    echo "New record created successfully";
}} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

?>
<div id="topbar" name="pop1">
 <img src="logo.jpg" id="logo">
            <button id='resv_button'>STAFF MANAGEMENT</button>
<div id="nav_menu">

                <a href="print_staff.php"><button >Staff</button></a>&nbsp;&nbsp;
                <a href="print_supplier.php"><button>Supplier</button></a>&nbsp;&nbsp;
		<a href="print_product.php"><button>Product</button></a>&nbsp;&nbsp;               
                <a href="print_transaction.php"><button>Tranaction</button></a>&nbsp;&nbsp;
		<a href="print_customer.php"><button >Customer</button></a>&nbsp;&nbsp;
               
		
            </div>
            
        </div>
        <div id="homepic" >
                        <a id="top"></a>

        </div> 
<table width="500" cellpadding=5 cellspacing=5 border=1>
	<tr>
	<th>ID#</th>
	<th>PName</th>
	<th>Quantity</th>
	<th>Total Cost</th>
	</tr>

		<tr>
	<center>
	<td><?php echo $PID;?></td>
	<td><?php echo $PNAME;?></td>
	<td><?php echo $QTY;?></td>
	<td>Rs <?php echo $TOTALCOST;?>/-</td>
	
	</tr>
	
	</center>
	</table>
	<br>Click to add next Transaction<br>
	<button><a href="add_transaction.php">Click</button>
</body>
</html>