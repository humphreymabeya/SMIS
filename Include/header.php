
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">SMIS | Codesoft</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <marquee><h4 style="color:black;">Hi, <b><i class="fa fa-user fa-fw"></i> <?php echo htmlspecialchars($_SESSION['username']); ?> </b> </h4> </marquee>
            </ul>
        </nav>
        
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <!-- <div class="user-img-div">
                            <img src="img/user.png" class="img-thumbnail" />
                            <div class="inner-text">
                                <?php echo $_SESSION['username'];?>
                            <br />     
                            </div>
                        </div> -->

                    </li>


                    <li>
                        <a class="active-menu" href="../index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
					
					 <li>
                        <a href="../School/branch.php"><i class="fa fa-university "></i>School</a>
                    </li>
					
					 <li>
                        <a href="../Students/student.php"><i class="fa fa-users "></i>Students</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> Finance<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Finance/fees.php"><i class="fa fa-usd"></i>Students` Fee Payment</a>
                                </li>
                                <li>
                                <a href="../Finance/salary.php"><i class="fa fa-euro"></i>Staff Salary Payment</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                    </li> 
					
                    <li>
                        <a href="../Students/exam.php"><i class="fa fa-file-excel-o"></i>Examinations</a>
                    </li>
                    <li>
                        <a href="../Staff/staff.php"><i class="fa fa-user"></i>Instructors</a>
                    </li>
                    <li>
                        <a href="../Reports/report.php"><i class="fa fa-file-pdf-o"></i>Reports</a>
                    </li>
					
                    <!-- <li>
                        <a href="#"><i class="fa fa-file-pdf-o"></i>Reports <span class="fa arrow"></span></a> -->
                        <!-- second level -->
                        <!-- <ul class="nav nav-second-level">
                            <li>
                                <a href="../Reports/report.php"><i class="fa fa-file-word-o"></i>Students</a>
                            </li>
                            
                        </ul>
                    </li> -->
					
					<li>
                        <a href="#"><i class="fa fa-cogs fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Session/changePassword.php"><i class="fa fa-key"></i>Change  Password</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-user"></i>User Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-history"></i>User logs</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                    </li> 
					
					<li>
                        <a href="../Session/logout.php"><i class="fa fa-power-off "></i>Logout</a>
                    </li>
					
			
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->