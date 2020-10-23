<html>
<head> 
<title>Log Management</title>

<link rel="stylesheet" type="text/css" href="C1.css" />
        
  </head> 


<body>
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
$result=mysqli_query($connect,"SET @p0=$ID");
$result=mysqli_query($connect,"SELECT `count_c`(@p0) AS `count_customer");
$row = mysqli_fetch_row($result);
$COUNT = (int) $row[0];
$sql=mysqli_query($connect,"SET @p0=$ID");
$sql=mysqli_query($connect,"SELECT `sum_customer`(@p0) AS `sum_customer");
$row1 = mysqli_fetch_row($sql);
$SUM = (int) $row1[0];
$res=mysqli_query($connect,"SET @p0=$ID");
$res=mysqli_query($connect,"CALL `get_customer`(@p0);");
while($row=mysqli_fetch_array($result))
{$TOTALCOST=$row['TOTALCOST'];
$PID=$row['ID'];	
}

mysqli_close($connect);
  ?>
<div id="topbar" name="pop1">
 <img src="logo.jpg" id="logo">
            <button id='resv_button'>MONEY LOG</button>
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

	<th> Customer ID</th>
	<th>Customer Name</th>
	<th>Customer Number</th>
	<th>Customer Type</th>
	<th>Number of Products </th>
	<th> Total Cost </th>
	</tr>
	<tr>
	<center>
	

	<td><?php echo $ID;?></td>
<?php while($row=mysqli_fetch_array($res)):?>
	
	<td><?php echo $row['NAME'];?></td>
	<td><?php echo $row['TYPE'];?></td>
	<td><?php echo $row['NUMBER'];?></td>
	<td><?php echo $COUNT;?></td>
	<td><?php echo $SUM;?></td>
	
	
	<?php endwhile;?> 
	</center>
	</table>
	
	</tr>
	
	</center>
	</table>
</body>
</html>
