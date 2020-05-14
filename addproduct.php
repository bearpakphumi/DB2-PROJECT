<?php

require_once('connections.php');
$ItemName = trim($_POST['itemname']);

$ItemCategories = trim($_POST['itemcategories']);

$ItemAmount = trim($_POST['itemamount']);

$ItemPrice = trim($_POST['itemprice']);


$sql2 = "INSERT INTO Product (ItemName, ItemCategories, ItemAmount, ItemPrice) VALUES ('{$ItemName}', '{$ItemCategories}', {$ItemAmount}, {$ItemPrice})";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                        <h2>Add Product</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <?php
                            // If insert data successfully, show information and redirect to index.php
                            if($conn->query($sql2) == TRUE){
                                echo "<div id='message'>New record created successfully <hr/>Please wait to redirect...</div>";
                                echo "<meta http-equiv='refresh' content='10;url=index2.php'>"; // Redirect to index.php
                        } else {
                                echo "<div id='message'>Error: " . $sql2 . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                                echo "<meta http-equiv='refresh' content='10;url=index2.php'>"; // Redirect to index.php
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
