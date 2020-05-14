<?php

require_once('connections.php');

// Sent from editmember_form.php by Method post , receive with $_POST

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$phonenumber = trim($_POST['phonenumber']);

$birthdate = $year.'-'.$month.'-'.$day; // Formatting date like database date format.(Y-m-d)

// ตรวจสอบว่ามีการแก้ไข Password ไหม
if(!empty($_POST['password'])){
    $sql = "UPDATE Customer SET firstname='{$firstname}',lastname='{$lastname}',birthdate='{$birthdate}',email='{$email}',address='{$address}',phonenumber='{$phonenumber}'";
}else{
$sql = "UPDATE Customer SET firstname='{$firstname}',lastname='{$lastname}',birthdate='{$birthdate}',email='{$email}',address='{$address}',phonenumber='{$phonenumber}'";}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Customer</title>
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
                        <h2>Edit Customer</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <?php
                        // If member's data is updated successfully, show information and redirect to index.php
                        if($conn->query($sql) == TRUE){
                            echo "<div id='message'>Record updated successfully <hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=index2.php'>"; // Redirect to index.php
                        } else {
                            echo "<div id='message'>Error: " . $sql . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
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