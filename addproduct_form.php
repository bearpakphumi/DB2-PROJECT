<?php

require_once('connections.php');

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
                        <h2>Add Product</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index2.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="addproduct" method="post" action="addproduct.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Name :</td>
                                    <td><input type="text" name="itemname" style="width: 250px; height: 30px;"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Categories :</td>
                                    <td>

                                        <!-- Dropdrown for Categories -->
                                        <select name="itemcategories" style="height: 30px;">
                                            <option selected value="01">Meat</option>
                                            <option value="02">Frozen Food</option>
                                            <option value="03">Water</option>
                                            <option value="04">Vegetable</option>
                                            <option value="05">Cooking Tool</option>
                                            <option value="06">Cleaning Tool</option>
                                            <option value="07">Other</option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Amount :</td>
                                    <td><input type="text" name="itemamount" style="width: 250px; height: 30px;"/></td>
                                </tr>
								<tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Price :</td>
                                    <td><input type="text" name="itemprice" style="width: 250px; height: 30px;"/></td>
								</tr>

                                <tr>
                                    <td style="width: 120px; text-align: right;"></td>
                                    <td><input type="submit" name="submit" value="Submit" class="btn btn-dark" onclick="return confirm('Do you want to submit?')"/> </td>
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
