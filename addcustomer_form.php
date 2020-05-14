<?php

require_once('connections.php');

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
                        <h2>Add Customer</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index2.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="addmember" method="post" action="addmember.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Firstname :</td>
                                    <td><input type="text" name="firstname" style="width: 250px; height: 30px;"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">lastname :</td>
                                    <td><input type="text" name="lastname" style="width: 250px; height: 30px;"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Birthday :</td>
                                    <td>
                                        <!-- Dropdrown for day -->
                                        <select name="day" style="height: 30px;">
                                        <?php for($d=1; $d<=31; $d++){ ?>
                                            <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                        <?php } ?>
                                        </select>
                                        <!-- End Dropdrown for day -->

                                        <!-- Dropdrown for Month -->
                                        <select name="month" style="height: 30px;">
                                            <option selected value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <!-- End Dropdrown for Month -->

                                        <!-- Dropdrown for year -->
                                        <select name="year" style="height: 30px;">
                                            <?php for($y=date('Y'); $y>=(date('Y')-50); $y--){ ?>
                                                <option value="<?php echo $y;?>"><?php echo $y;?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- End Dropdrown for year -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Email :</td>
                                    <td><input type="email" name="email" style="width: 250px; height: 30px;"/></td>
                                </tr>
								<tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Address :</td>
                                    <td><input type="text" name="address" style="width: 250px; height: 30px;"/></td>
								</tr>
								<tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Phone Number :</td>
                                    <td><input type="text" name="phonenumber" style="width: 250px; height: 30px;"/></td>
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
