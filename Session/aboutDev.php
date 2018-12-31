<?php
    include ("../Include/dbconnect.php");
    include ("../Include/checklogin.php");

?>
<!-- html script -->
<!DOCTYPE html>
<html>
    <head>
        <title>About Developer | SMIS</title>
        <?php include("../Include/links.php"); ?>
    </head>
    <?php
        include("../Include/header.php")
    ?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Developer Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Know your Developer
                        </div>
                        <div class="panel-body">
                            <p style="text-align:center;">
                            <strong>
                                Name: Mabeya Humphrey<br>
                                Location: Machakos, Kenya<br>
                                Email: humphreymabeya@gmail.com<br>
                                Contact: +254719 136 107<br>
                                Company: Codesoft Technologies<br>
                                Languages: PHP, Python, C#, MySQL, Javascript<br>
                            </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../Include/footer.php");
    ?>
    </body>
</html>