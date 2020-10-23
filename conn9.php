<html>
<head> 
<title>Staff Management</title>

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

$des=$_POST['DES'];
$result=mysqli_query($connect,"SET @p0='$des'");
$result=mysqli_query($connect,"CALL STAFF_DESIGNATION(@p0);");

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
	<th>Name</th>				
	<th>Type</th>
	<th>Salary</th>
	<th>Comment</th>
	</tr>

	<tr>
	<center>
<?php while($row=mysqli_fetch_array($result)):?>
	
	<td><?php echo $row["ID"];?></td>
	<td><?php echo $row['NAME'];?></td>
	
	<td><?php echo $row['TYPE'];?></td>

	<td><?php echo $row['SALARY'];?></td>
	<td><?php echo $row['COMMENTS'];?></td>
	</tr>
	<?php endwhile;?> 
	</center>
	</table>
</body>
</html>