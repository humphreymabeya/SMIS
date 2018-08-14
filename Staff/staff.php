<?php
	include("../Include/dbconnect.php");
    include("../Include/checklogin.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add Staff member | SMIS</title>
        <link rel="shortcut icon" type="image/png" href="../../img/favicon.png" />
        <!-- BOOTSTRAP STYLES-->
        <link href="../../css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="../../css/font-awesome.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="../../css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="../../css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />   
        <!-- JQUERY ADDON -->
        <script src="../../js/jquery-1.10.2.js"></script>
    </head>
    <?php
        include("../Include/header.php");
    ?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Staff / Instructors` Details</h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../Include/footer.php");
    ?>
  	<!-- BOOTSTRAP SCRIPTS -->
    <script src="../../js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../../js/custom1.js"></script> 
    </body>
</html>