<?php

require_once('connections.php');

$shipping_id = $_GET['id']; // Receive id from index.php by $_GET

// Data Query by id
$sql4 = "SELECT * FROM Shipping WHERE Shipping_id={$shipping_id}";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();

// Decompose Birthdate in array for <select> 
$array_arrivedate = explode('-', $row4['Arrive_Date']);
$year = $array_arrivedate[0];
$month = $array_arrivedate[1];
$day = $array_arrivedate[2];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                        <h2>Edit Shipping</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index2.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="editshipping" method="post" action="editshipping.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">

                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Customers ID :</td>
                                    <td><input type="text" name="customers_id" style="width: 250px; height: 30px;" value="<?php echo $row4['CustomerS_ID'];?>"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Carts ID :</td>
                                    <td><input type="text" name="carts_id" style="width: 250px; height: 30px;" value="<?php echo $row4['CartS_ID'];?>"/></td>
                                </tr>
								<tr>								
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Products ID :</td>
                                    <td><input type="text" name="products_id" style="width: 250px; height: 30px;" value="<?php echo $row4['ProductS_ID'];?>"/></td>
								</tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Arrive Date :</td>
                                    <td>
                                        <!-- Dropdrown for day -->
                                        <select name="day" style="height: 30px;">
                                        <?php for($d=1; $d<=31; $d++){ ?>
                                            <option value="<?php echo $d;?>" <?php if($day == $d){ echo "selected";}?>><?php echo $d;?></option>
                                        <?php } ?>
                                        </select>
                                        <!-- End Dropdrown for day -->

                                        <!-- Dropdrown for Month -->
                                        <select name="month" style="height: 30px;">
                                            <option value="01" <?php if($month == '01'){ echo "selected";}?>>January</option>
                                            <option value="02" <?php if($month == '02'){ echo "selected";}?>>February</option>
                                            <option value="03" <?php if($month == '03'){ echo "selected";}?>>March</option>
                                            <option value="04" <?php if($month == '04'){ echo "selected";}?>>April</option>
                                            <option value="05" <?php if($month == '05'){ echo "selected";}?>>May</option>
                                            <option value="06" <?php if($month == '06'){ echo "selected";}?>>June</option>
                                            <option value="07" <?php if($month == '07'){ echo "selected";}?>>July</option>
                                            <option value="08" <?php if($month == '08'){ echo "selected";}?>>August</option>
                                            <option value="09" <?php if($month == '09'){ echo "selected";}?>>September</option>
                                            <option value="10" <?php if($month == '10'){ echo "selected";}?>>October</option>
                                            <option value="11" <?php if($month == '11'){ echo "selected";}?>>November</option>
                                            <option value="12" <?php if($month == '12'){ echo "selected";}?>>December</option>
                                        </select>
                                        <!-- End Dropdrown for Month -->

                                        <!-- Dropdrown for year -->
                                        <select name="year" style="height: 30px;">
                                            <?php for($y=date('Y'); $y>=(date('Y')-50); $y--){ ?>
                                                <option value="<?php echo $y;?>" <?php if($year == $y){ echo "selected";}?>><?php echo $y;?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- End Dropdrown for year -->
                                    </td>
                                </tr>
								<tr>								
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Shipping Address :</td>
                                    <td><input type="text" name="shipping_address" style="width: 250px; height: 30px;" value="<?php echo $row4['Shipping_Address'];?>"/></td>
								</tr>
                                <tr>
                                    <td style="width: 120px; text-align: right;"></td>
                                    <td>
                                        <input type="hidden" name="shipping_id" value="<?php echo $row4['id'];?>" /><!-- Send id of edit record -->
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
