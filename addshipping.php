<?php

require_once('connections.php');



$customers_id = trim($_POST['customers_id']);
$carts_id = trim($_POST['carts_id']);
$products_id = trim($_POST['products_id']);
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$shipping_address = trim($_POST['shipping_address']);

$arrivedate = $year.'-'.$month.'-'.$day;

$sql4 = "INSERT INTO Shipping (CustomerS_ID, CartS_ID, ProductS_ID, Arrive_Date, Shipping_Address) VALUES ('{$customers_id}', '{$carts_id}', '{$products_id}', '{$arrivedate}', '{$shipping_address}')";

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Shipping</title>
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
                        <h2>Add Shipping</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <?php

                            if($conn->query($sql4) == TRUE){
                                echo "<div id='message'>New record created successfully <hr/>Please wait to redirect...</div>";
                                echo "<meta http-equiv='refresh' content='10;url=index2.php'>"; 
                        } else {
                                echo "<div id='message'>Error: " . $sql4 . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                                echo "<meta http-equiv='refresh' content='10;url=index2.php'>"; 
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
