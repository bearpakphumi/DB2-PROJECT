<?php

require_once('connections.php');

$cart_id = trim($_POST['cart_id']);
$customerc_id = trim($_POST['customerc_id']);
$productc_id = trim($_POST['productc_id']);
$product_amount = trim($_POST['product_amount']);
$product_price = trim($_POST['product_price']);


$sql3 = "UPDATE Cart SET CustomerC_ID='$ustomer_id', ProductC_ID='$productc_id', Product_Amount='$product_amount', Product_Price='$product_price' WHERE Cart_ID='$cart_id'";
$result3 = $conn->query($sql3);
?>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cart</title>
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
                    <td style="text-align: center;">
                        <?php
                        // If member's data is updated successfully, show information and redirect to index.php
                        if($conn->query($sql3) == TRUE){
                            echo "<div id='message'>Record updated successfully <hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=index2.php'>"; // Redirect to index.php
                        } else {
                            echo "<div id='message'>Error: " . $sql3 . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=index2.php'>"; // Redirect to index.php
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php $conn->close(); ?>
</div>
</body>
</html>