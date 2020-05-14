<?php

require_once('connections.php');

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM Product";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM Cart";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM Shipping";
$result4 = $conn->query($sql4);

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="asset/css/bootstrap.css" rel="stylesheet"/>
    <script src="asset/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%" cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <h2>Customer</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addcustomer_form.php" class="btn btn-info">Add Customer</a>
						<a href="logout.php" class="btn btn-danger">Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Firstname</th>
                                <th>lastname</th>
                                <th>Birthday</th>
                                <th>Email</th>
								<th>Address</th>
								<th>Phone Number</th>
                                <th style="width: 100px;">Action</th>

                            </tr>
                            <?php

                                if ($result->num_rows > 0) {
                                    $i = 1;
                                    while($row = $result->fetch_assoc()){ 
                                        $bdate = strtotime($row['birthdate']);
                                        $birthdate = date('d/m/Y', $bdate);
                                        ?>

                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['firstname'];?></td>
                                    <td><?php echo $row['lastname'];?></td>
                                    <td><?php echo $birthdate;?></td>
                                    <td><?php echo $row['email'];?></td>
									<td><?php echo $row['address'];?></td>
									<td><?php echo $row['phonenumber'];?></td>
                                    <td>
                                        <a href="editcustomer_form.php?id=<?php echo $row['customer_id'];?>" class="btn btn-warning">Edit</a>&nbsp;
                                        <a href="deletecustomer.php?id=<?php echo $row['customer_id'];?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                        $i++;
                                    }
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<hr />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%" cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <h2>Product</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addproduct_form.php" class="btn btn-info">Add Product</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                            <tr>
								<th style="width: 50px;">#</th>
                                <th>Name</th>
                                <th>Categories</th>
								<th>Amount</th>
                                <th>Price</th>
                                <th style="width: 100px;">Action</th>

                            </tr>
                            <?php

                                if ($result2->num_rows > 0) {
                                    $i = 1;
									while($row2 = $result2->fetch_assoc()){
							?>
                                <tr>

									<td><?php echo $i;?></td>
                                    <td><?php echo $row2['ItemName'];?></td>
                                    <td><?php echo $row2['ItemCategories'];?></td>
									<td><?php echo $row2['ItemAmount'];?></td>
									<td><?php echo $row2['ItemPrice'];?></td>
                                    <td>
                                        <!–- Link for Edit and Delete -->
										<a href="editproduct_form.php?id=<?php echo $row2['ItemID'];?>" class="btn btn-warning">Edit</a>&nbsp;	
										<a href="deleteproduct.php?id=<?php echo $row2['ItemID'];?>" class="btn btn-danger">Delete</a>										
                                    </td>
                                </tr>
                            <?php
                                        $i++;
                                    }
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<hr />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%" cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <h2>Cart</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addcart_form.php" class="btn btn-info">Add Cart</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>CustomerID</th>
                                <th>ProductID</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th colspan="2">Action</th>

                            </tr>
                            <?php

                               if ($result3->num_rows > 0) {
                                    $i = 1;
									while($row3 = $result3->fetch_assoc()){
                                        ?>

                                        <!-- // Show the reault of Query via variable $row by echo command -->
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row3['CustomerC_ID'];?></td>
                                    <td><?php echo $row3['ProductC_ID'];?></td>
									<td><?php echo $row3['Product_Amount'];?></td>
									<td><?php echo $row3['Product_Price'];?></td>
                                    <td>
                                        <!–- Link for Edit and Delete -->
                                        <a href="editcart_form.php?id=<?php echo $row3['Cart_ID'];?>" class="btn btn-warning">Edit</a>&nbsp;
                                        <a href="deletecart.php?id=<?php echo $row3['Cart_ID'];?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                        $i++;
                                    }
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<hr />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%" cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <h2>Shipping</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addshipping_form.php" class="btn btn-info">Add Shipping</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>CustomerID</th>
                                <th>CartID</th>
								<th>ProductID</th>
								<th>Arrive Date</th>
								<th>Shipping Address</th>
                                <th colspan="2">Action</th>

                            </tr>
                            <?php


                                if ($result4->num_rows > 0) {
                                    $i = 1;
                                    while($row4 = $result4->fetch_assoc()){ 
                                        $adate = strtotime($row4['Arrive_Date']);
                                        $arrivedate = date('d/m/Y', $adate);
                                        
                                        ?>

                                        <!-- // Show the reault of Query via variable $row by echo command -->
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row4['CustomerS_ID'];?></td>
                                    <td><?php echo $row4['CartS_ID'];?></td>
									<td><?php echo $row4['ProductS_ID'];?></td>
									<td><?php echo $row4['Arrive_Date'];?></td>
									<td><?php echo $row4['Shipping_Address'];?></td>
                                    <td>
                                        <!–- Link for Edit and Delete -->
                                        <a href="editshipping_form.php?id=<?php echo $row4['Shipping_ID'];?>" class="btn btn-warning">Edit</a>&nbsp;
                                        <a href="deleteshipping.php?id=<?php echo $row4['Shipping_ID'];?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                        $i++;
                                    }
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
$conn->close();// ปิด Connection
?>
</div>
</body>
</html>
