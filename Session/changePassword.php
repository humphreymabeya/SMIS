<?php
	include("../Include/dbconnect.php");
    include("../Include/checklogin.php");
	$error = '';
	if(isset($_POST['save']))
	{

		$oldpassword = mysqli_real_escape_string($conn,$_POST['oldpassword']);
		$newpassword = mysqli_real_escape_string($conn,$_POST['newpassword']);
		$hashed_password = password_hash($_POST['oldpassword'], PASSWORD_DEFAULT);
		$sql = "select * from users where username= '".$_SESSION['username']."' "; 
		
		$q = $conn->query($sql);
		if(password_verify($oldpassword, $q->fetch_assoc()['password'])){		
			$fetch = $conn->query("update users set password = '".password_hash($newpassword, PASSWORD_DEFAULT)."' WHERE username = '".$_SESSION['username']."'");
			echo '<script type="text/javascript">window.location="changePassword.php?act=1"; </script>';
		}else
		{
			$error = '<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> Wrong old password
			</div>';
		}

	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMIS | User Settings</title>
	<link rel="shortcut icon" type="image/png" href="../img/favicon.png" />
    <!-- BOOTSTRAP STYLES-->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="../css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<script src="../js/jquery-1.10.2.js"></script>
	
	<script type="text/javascript" src="../js/validation/jquery.validate.min.js"></script>
	
</head>
<?php
include("../Include/header.php")
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Change Password</h1>
                     
							<?php
							if(isset($_REQUEST['act']) &&  @$_REQUEST['act']=='1')
							{
							echo '<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Success!</strong> Password Changed Successfully.
								</div>';

							}
							echo $error;
							?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				
                    <div class="col-sm-8 col-sm-offset-2">
               			<div class="panel panel-primary">
							<div class="panel-heading">
							Change Password
							</div>
							<form action="changePassword.php" method="post" id="signupForm1" class="form-horizontal">
                        		<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-4 control-label" for="Old">Old Password</label>
										<div class="col-sm-5">
											<input type="password" class="form-control" id="oldpassword" name="oldpassword"  />
										</div>
									</div>
							
									<div class="form-group">
										<label class="col-sm-4 control-label" for="Password"> New Password</label>
										<div class="col-sm-5">
											<input class="form-control" name="newpassword" id="newpassword" type="password">
										</div>
									</div>
							
									<div class="form-group">
										<label class="col-sm-4 control-label" for="Confirm">Confirm Password</label>
										<div class="col-sm-5">
											<input class="form-control" name="confirmpassword" type="password">
										</div>
									</div>
						
									<div class="form-group">
										<div class="col-sm-9 col-sm-offset-4">
											<button type="submit" name="save" class="btn btn-primary">Save </button>
										</div>
									</div>
 
                         		</div>
							</form>
							
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <?php
        include("../Include/footer.php");
    ?>
   
  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom1.js"></script>
    
	<script type="text/javascript">
		
		$( document ).ready( function () {			
			
			$( "#signupForm1" ).validate( {
				rules: {
					oldpassword: "required",
				
					newpassword: {
						required: true,
						minlength: 6
					},
					
					confirmpassword: {
						required: true,
						minlength: 6,
						equalTo: "#newpassword"
					}
				},
				messages: {
					oldpassword: "Please enter your old password",
					
					newpassword: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long"
					},
					confirmpassword: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long",
						equalTo: "Please enter the same password as above"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>

</body>
</html>
