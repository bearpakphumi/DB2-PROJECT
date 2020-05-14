<?php

require_once('connections.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin</title>
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
                        <h2>Register User</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index.php" class="btn btn-info">Back</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="addadmin" method="post" action="addadmin.php">
                            <table width="100%" cellspacing="5" cellpadding="5" class="table table-striped">
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Username :</td>
                                    <td><input type="text" name="username" style="width: 250px; height: 30px;"/></td>
                                </tr>
                                <tr>
                                    <td style="width: 120px; text-align: right; font-weight: bold;">Password :</td>
                                    <td><input type="password" name="password" style="width: 250px; height: 30px;"/></td>
                                </tr>
								<tr>
								<td>
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