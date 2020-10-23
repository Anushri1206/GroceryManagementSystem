<html>
<head> 
<title>Log Management</title>

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


$result=mysqli_query($connect,"select * from inventorylog");

$sql=mysqli_query($connect,"select PID,PNAME,PNOOFITEMS from product");

?>
  <div id="topbar" name="pop1">
            <img src="logo.jpg" id="logo">
            <button id='resv_button'>Logs</button>
    
            <div id="nav_menu">
<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Customer
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    
      <a href="print_customer.php">Print Customer</a>
	<a href="check_customer.html">Check Customer & BILL</a>
    </div></div>
 <div class="dropdown">
    <button class="dropbtn">Supplier
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="print_supplier.php">Print Supplier</a>
    </div></div>
  <div class="dropdown">
    <button class="dropbtn">Product
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      
      <a href="print_product.php">Print Product</a>
    </div></div>
<div class="dropdown">
	 <button class="dropbtn">Staff
      <i class="fa fa-caret-down"></i>
    </button>
	 <div class="dropdown-content">
     
      <a href="print_staff.php">Print Staff</a>
	
<a href="check_staff.html">Check Staff</a>
<a href="check_designation.html">Check Designation</a>
    </div>
  </div>
<div class="dropdown">
    <button class="dropbtn">Transaction
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     
 <a href="print_transaction.php">Print Transactions</a>
    </div></div>
	<div class="dropdown">
    <button class="dropbtn">Logs
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="money_log.php">Money Log</a>
      <a href="inventory_log.php">Inventory Log</a>

    </div></div>

</div>
       </div>
</div>         
                
        <div id="homepic" >
                        <a id="top"></a>

        </div>
<table width="500" cellpadding=5 cellspacing=5 border=1>
	<h3> INVENTORY LOG</h3>
	<tr>
	<th>PID#</th>
	<th>PName</th>
	<th>Quantity</th>
	<th>Updated At </th>
	</tr>

	<?php while($row=mysqli_fetch_array($result)):?>
	<tr>
	<td><?php echo $row['PID'];?></td>
	<td><?php echo $row['PNAME'];?></td>
	<td><?php echo $row['PNOOFITEMS'];?></td>
	<td><?php echo $row['updated_at'];?></td>

	</tr>
	<?php endwhile;?> 
	</table>
	
	<table width="500" cellpadding=5 cellspacing=5 border=1>
	<h3> CURRENT INVENTORY</h3>
	<tr>
	<th>PID#</th>
	<th>PName</th>
	<th>Quantity</th>
	</tr>

	<?php while($row=mysqli_fetch_array($sql)):?>
	<tr>
	<td><?php echo $row['PID'];?></td>
	<td><?php echo $row['PNAME'];?></td>
	<td><?php echo $row['PNOOFITEMS'];?></td>
	</tr>
	<?php endwhile;?> 
	</table>

</body>
</html>