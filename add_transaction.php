

<!DOCTYPE HTML> 
<html> 
<head> 
<title>Transaction  Management</title>



	<link rel="stylesheet" type="text/css" href="C1.css" />
        
            
          

 </head> 
<body>
<div id="topbar" name="pop1">
            <img src="logo.jpg" id="logo">
            <button id='resv_button'>WELCOME ADMIN</button>
    
            <div id="nav_menu">
<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Customer
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_customer.html">Add Customer</a>
      <a href="edit_customer.html">Edit Customer</a>
      <a href="print_customer.php">Print Customer</a>
	<a href="check_customer.html">Check Customer & BILL</a>
    </div></div>
 <div class="dropdown">
    <button class="dropbtn">Supplier
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_supplier.html">Add Supplier</a>
      <a href="delete_supplier.html">Delete Supplier</a>
      <a href="print_supplier.php">Print Supplier</a>
    </div></div>
  <div class="dropdown">
    <button class="dropbtn">Product
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_product.html">Add Product</a>
      <a href="delete_product.html">Delete Product</a>
      <a href="print_product.php">Print Product</a>
    </div></div>
<div class="dropdown">
	 <button class="dropbtn">Staff
      <i class="fa fa-caret-down"></i>
    </button>
	 <div class="dropdown-content">
      <a href="add_staff.html">Add Staff</a>
      <a href="delete_staff.html">Delete Staff</a>
      <a href="print_staff.php">Print Staff</a>
	<a href="edit_staff.html">Edit Staff</a>
<a href="check_staff.html">Check Staff</a>
<a href="check_designation.html">Check Designation</a>
    </div>
  </div>
<div class="dropdown">
    <button class="dropbtn">Transaction
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_transaction.php">Daily Transaction</a>
      <a href="add_newsupply.php">New Shipment of Supplies</a>
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

        </div> <div id="contact"> <h2>NEW TRANSACTION</h2>
<h3>Enter Product Name and Quantity to get Cost</h3> 
<form method="POST" action="conn4.php">

<br>Product Name<br>

<select id="NAME" name="NAME">
	<option value="0" selected="selected">Select Product Name </option>
 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$qry1="SELECT PNAME FROM PRODUCT;";
$result1 = $conn->query($qry1);

if($result1->num_rows > 0){
	while($row=$result1->fetch_assoc()){
	
	echo"<option>".$row["PNAME"]."</option>";
}}	
?>
</select>
<br>Customer ID <br><input type="number" name="CID">
<br>Quantity<br><input type="number" name="QTY">
 <input type="submit" value="submit"> 
</form> 
</div> 
</body> 
</html>

