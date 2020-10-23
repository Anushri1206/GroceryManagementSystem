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

$sid=$_POST['ID'];
$result=mysqli_query($connect,"CALL get_staff($sid);");


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
	<th>Qualification</th>
	<th>Number</th>
	<th>Email</th>				
	<th>Type</th>
	<th>Address</th>
	<th>Salary</th>
	<th>Comment</th>
	</tr>

	<?php while($row=mysqli_fetch_array($result)):?>
	<tr>
	<center>
	<td><?php echo $row['ID'];?></td>
	<td><?php echo $row['NAME'];?></td>
	<td><?php echo $row['QUALIFICATION'];?></td>
	<td><?php echo $row['NUMBER'];?></td>
	<td><?php echo $row['EMAIL'];?></td>
	<td><?php echo $row['TYPE'];?></td>
	<td><?php echo $row['ADDRESS'];?></td>
	<td><?php echo $row['SALARY'];?></td>
	<td><?php echo $row['COMMENT'];?></td>
	</tr>
	<?php endwhile;?> 
	</center>
	</table>
</body>
</html>