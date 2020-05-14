<?php

require_once('connections.php');

$ItemID = $_POST['itemid'];
$ItemName = $_POST['itemname'];
$ItemCategories = $_POST['itemcategories'];
$ItemAmount = $_POST['itemamount'];
$ItemPrice = $_POST['itemprice'];



$sql2 = "UPDATE Product SET ItemName='$ItemName', ItemCategories='$ItemCategories', ItemAmount=$ItemAmount, ItemPrice=$ItemPrice WHERE ItemID=$ItemID";
$result2 = $conn->query($sql2);

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
                        <h2>Edit Product</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <?php
                        // If member's data is updated successfully, show information and redirect to index.php
                        if($conn->query($sql2) == TRUE){
                            echo "<div id='message'>Record updated successfully <hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=index2.php'>"; // Redirect to index.php
                        }else{
                            echo "<div id='message'>Error: " . $sql2 . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=index2.php'>"; // Redirect to index.php
						}
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php  $conn->close(); ?>
</div>
</body>
</html>