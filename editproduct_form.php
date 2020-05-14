<?php

require_once('connections.php');

$itemid = $_GET['id']; // Receive id from index.php by $_GET

// Data Query by id
$sql2 = "SELECT * FROM Product WHERE ItemID='{$itemid}'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$ItemCategories = '00';

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
                    <td>
                        <a href="index2.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="edititem" method="post" action="edititem.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">

                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Name :</td>
                                    <td><input type="text" name="itemname" style="width: 250px; height: 30px;" value="<?php echo $row2['ItemName'];?>"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Categories :</td>
                                    <td>
                                        <select name="itemcategories" style="height: 30px;">
                                            <option value="01" <?php if($ItemCategories == '01'){ echo "selected";}?>>Meat</option>
											<option value="02" <?php if($ItemCategories == '02'){ echo "selected";}?>>Frozen Food</option>
											<option value="03" <?php if($ItemCategories == '03'){ echo "selected";}?>>Water</option>
											<option value="04" <?php if($ItemCategories == '04'){ echo "selected";}?>>Vegetable</option>
											<option value="05" <?php if($ItemCategories == '05'){ echo "selected";}?>>Cooking Tool</option>
											<option value="06" <?php if($ItemCategories == '06'){ echo "selected";}?>>Cleaning Tool</option>
											<option value="07" <?php if($ItemCategories == '07'){ echo "selected";}?>>Other</option>
										</select>
                                    </td>
									
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Amount :</td>
                                    <td><input type="text" name="itemamount" style="width: 250px; height: 30px;" value="<?php echo $row2['ItemAmount'];?>"/></td>
                                </tr>
								<tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Price :</td>
                                    <td><input type="text" name="itemprice" style="width: 250px; height: 30px;" value="<?php echo $row2['ItemPrice'];?>"/></td>
								</tr>                                
                                <tr>
                                    <td style="width: 120px; text-align: right;"></td>
                                    <td>
                                        <input type="hidden" name="itemid" value="<?php echo $row2['id'];?>" /><!-- Send id of edit record -->
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
