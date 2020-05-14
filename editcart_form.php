<?php

require_once('connections.php');

$cart_id = $_GET['id'];


$sql3 = "SELECT * FROM Cart WHERE Cart_ID={$cart_id}";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Product</title>
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
                        <h2>Edit Cart</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index2.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="editcart" method="post" action="editcart.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">

                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Customer ID :</td>
                                    <td><input type="text" name="customerc_id" style="width: 250px; height: 30px;" value="<?php echo $row3['CustomerC_ID'];?>"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Product ID :</td>
                                    <td><input type="text" name="productc_id" style="width: 250px; height: 30px;" value="<?php echo $row3['ProductC_ID'];?>"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Amount :</td>
                                    <td><input type="text" name="product_amount" style="width: 250px; height: 30px;" value="<?php echo $row3['Product_Amount'];?>"/></td>
                                </tr>
								<tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Price :</td>
                                    <td><input type="text" name="product_price" style="width: 250px; height: 30px;" value="<?php echo $row3['Product_Price'];?>"/></td>
								</tr>                                
                                <tr>
                                    <td style="width: 120px; text-align: right;"></td>
                                    <td>
                                        <input type="hidden" name="cart_id" value="<?php echo $row3['id'];?>" /><!-- Send id of edit record -->
                                        <input type="submit" name="submit" value="Submit" class="btn btn-dark" onclick="return confirm('Do you want to submit?')"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
</body>
</html>
