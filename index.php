<?php
    include("Include/dbconnect.php");
    include("Include/checklogin.php");
    $sql = '';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SMIS | Welcome | Karibu</title>
    <?php include("Include/links.php"); ?>
    <!-- CUSTOM PANEL STYLES -->
    <link href="css/panel.css" rel="stylesheet" />
</head>
<?php
    include("Include/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h2 style="text-align:center;"> Welcome to <strong>School Management Information System</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $conn->select_db("SMIS2"); 
                                            $result = $conn->query("Select * from student where delete_status='0'");
                                            $num_rows = $result->num_rows;
                                        ?>
                                        <div class="huge"><h5 style="color: white; font-size: 20px"> <?php echo $num_rows ;?> </h5><hr></div>
                                        <div>Students</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../Students/student.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $conn->select_db("SMIS2"); 
                                            $result = $conn->query("Select * from staff where delete_status='0'");
                                            $num_rows = $result->num_rows;
                                        ?>
                                        <div class="huge"><h5 style="color: white; font-size: 20px"> <?php echo $num_rows ;?> </h5><hr></div>
                                        <div>Total No. of Staff</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../Staff/staff.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $sql = "SELECT sum(paid) as totalpaid FROM fees_transaction";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                               $totalpaid = $row['totalpaid'];
                                               
                                            }
                                        ?>
                                        <div class="huge"><h5 style="color: white; font-size: 20px">Ksh. <?php echo $totalpaid ;?></h5><hr></div>
                                        <div>Total Fees Collected</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../Reports/report.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $sql = "SELECT sum(balance) as balance FROM student";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                               $totalbalance = $row['balance'];
                                               
                                            }
                                        ?>
                                        <div class="huge"><h5 style="color: white; font-size: 20px">Ksh. <?php echo $totalbalance ;?></h5><hr></div>
                                        <div>Total Fee Arrears</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../Finance/fees.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            <!-- /.row -->
                <div class="row">
				
				    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="../Students/student.php">
                                <i class="fa fa-users fa-3x"></i>
                                <h5>Students</h5>
                            </a>
                        </div>
                    </div>
			
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="../Finance/fees.php">
                                <i class="fa fa-credit-card fa-3x"></i>
                                <h5>Fee Payment</h5>
                            </a>
                        </div>
                    </div>
					
					<div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="../Students/exam.php">
                                <i class="fa fa-file-excel-o fa-3x"></i>
                                <h5>Examinations</h5>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="../Staff/staff.php">
                                <i class="fa fa-user fa-3x"></i>
                                <h5>Instructors</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-envelope fa-3x"></i>
                                <h5>News</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="../Reports/report.php">
                                <i class="fa fa-file-text fa-3x"></i>
                                <h5>Reports</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr>
                </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <?php
        include("Include/footer.php");
    ?>
   
    <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>

</body>
</html>
