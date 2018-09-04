<?php
	include("../Include/dbconnect.php");
	include("../Include/checklogin.php");
	$errormsg = '';
	$action = "add";
	// initialize variables
	$id="";
	$emailid='';
	$iname='';
	$joindate = '';
	$remark='';
	$contact='';
	$idno='';
	$salary='';
	$about = '';
	$branch='';

	if(isset($_POST['save']))
	{
		$iname = mysqli_real_escape_string($conn,$_POST['iname']);
		$joindate = mysqli_real_escape_string($conn,$_POST['joindate']);
		$contact = mysqli_real_escape_string($conn,$_POST['contact']);
		$idno = mysqli_real_escape_string($conn,$_POST['idno']);
		$about = mysqli_real_escape_string($conn,$_POST['about']);
		$emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
		$branch = mysqli_real_escape_string($conn,$_POST['branch']);

		if($_POST['action']=="add")
		{
			$remark = mysqli_real_escape_string($conn,$_POST['remark']);
			$salary = mysqli_real_escape_string($conn,$_POST['salary']);
			$q1 = $conn->query("INSERT INTO staff (iname,joindate,contact,idno,about,emailid,branch,salary,remark) VALUES ('$iname','$joindate','$contact','$idno','$about','$emailid','$branch','$salary','$remark')") ;
			// $q1 = $conn->query("INSERT INTO staff (iname,joindate,salary) values ('$iname', '$joindate', '$salary')");
			// $sid = $conn->insert_id;	
			echo '<script type="text/javascript">window.location="staff.php?act=1";</script>';
			
		}else
			if($_POST['action']=="update")
			{
				$id = mysqli_real_escape_string($conn,$_POST['id']);	
				$sql = $conn->query("UPDATE  staff  SET  branch  = '$branch', iname = '$iname', contact = '$contact',idno='$idno', joindate = '$joindate', about = '$about', emailid = '$emailid'  WHERE  id  = '$id'");
				echo '<script type="text/javascript">window.location="staff.php?act=2";</script>';
			}
	}

	if(isset($_GET['action']) && $_GET['action']=="delete"){
		$conn->query("UPDATE  staff set delete_status = '1'  WHERE id='".$_GET['id']."'");	
		header("location: staff.php?act=3");
	}

	$action = "add";
	if(isset($_GET['action']) && $_GET['action']=="edit" ){
		$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

		$sqlEdit = $conn->query("SELECT * FROM staff WHERE id='".$id."'");
		if($sqlEdit->num_rows)
		{
			$rowsEdit = $sqlEdit->fetch_assoc();
			extract($rowsEdit);
			$action = "update";
		}else
		{
			$_GET['action']="";
		}

	}

	if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
	{
		$errormsg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> staff Record Added successfully</div>";
	}
	else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
	{
		$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> staff Record Updated successfully</div>";
	}
	else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
	{
		$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> staff Record deleted successfully</div>";
	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Add staff | SMIS</title>
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
	<link href="../../css/ui.css" rel="stylesheet" />
	<link href="../../css/datepicker.css" rel="stylesheet" />	
    <script src="../../js/jquery-1.10.2.js"></script>	
    <script type='text/javascript' src='../../js/jquery/jquery-ui-1.10.1.custom.min.js'></script>	
</head>
<?php
	include("../Include/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Staff Details 
							<?php
								echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
								' <a href="staff.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="staff.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
							?>
						</h1>
                     
						<?php
							echo $errormsg;
						?>
                    </div>
                </div>
						
				<?php 
				if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
				{
				?>
		
				<script type="text/javascript" src="../../js/validation/jquery.validate.min.js"></script>
                	<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
               				<div class="panel panel-primary">
								<div class="panel-heading">
									<?php echo ($action=="add")? "Add Staff": "Edit Staff"; ?>
								</div>
								<form action="staff.php" method="post" id="signupForm1" class="form-horizontal">
                        		<div class="panel-body">
									<fieldset class="scheduler-border" >
						 				<legend  class="scheduler-border">Personal Information:</legend>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="Old">Name* </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="iname" name="iname" value="<?php echo $iname;?>"  />
												</div>
											</div>
											<div class="form-group">
													<label class="col-sm-2 control-label" for="Old">Contact* </label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact;?>" maxlength="10" />
													</div>
											</div>
							
											<div class="form-group">
												<label class="col-sm-2 control-label" for="Old">ID Number* </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="idno" name="idno" value="<?php echo $idno;?>" maxlength="8" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label" for="Old">Branch* </label>
												<div class="col-sm-10">
													<select  class="form-control" id="branch" name="branch" >
														<option value="" >Select Branch</option>
														<?php
															$sql = "select * from branch where delete_status='0' order by branch.branch asc";
															$q = $conn->query($sql);
															
															while($r = $q->fetch_assoc())
															{
															echo '<option value="'.$r['id'].'"  '.(($branch==$r['id'])?'selected="selected"':'').'>'.$r['branch'].'</option>';
															}
														?>									
										
													</select>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-sm-2 control-label" for="Old">DOJ* </label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="joindate" name="joindate" value="<?php echo  ($joindate!='')?date("Y-m-d", strtotime($joindate)):'';?>" style="background-color: #fff;" readonly />
													</div>
											</div>
						 			</fieldset>
						
									<fieldset class="scheduler-border" >
						 				<legend  class="scheduler-border">Remenurations Information:</legend>
										<div class="form-group">
												<label class="col-sm-2 control-label" for="Old">Gross Monthly Pay* </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary;?>" <?php echo ($action=="update")?"disabled":""; ?>  />
												</div>
										</div>
						
										<?php
										if($action=="add")
										{
										?>
										
										<?php
										}
										?>
										
										<?php
										if($action=="add")
										{
										?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Password">Salary Remark </label>
											<div class="col-sm-10">
												<textarea class="form-control" id="remark" name="remark"><?php echo $remark;?></textarea >
											</div>
										</div>
										<?php
										}
										?>
							
									</fieldset>
							
							 		<fieldset class="scheduler-border" >
						 				<legend  class="scheduler-border">Optional Information:</legend>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Password">About staff </label>
											<div class="col-sm-10">
												<textarea class="form-control" id="about" name="about"><?php echo $about;?></textarea >
											</div>
										</div>
							
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Old">Email Id </label>
											<div class="col-sm-10">
												
												<input type="text" class="form-control" id="emailid" name="emailid" value="<?php echo $emailid;?>"  />
											</div>
										</div>
									</fieldset>
						
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="hidden" name="id" value="<?php echo $id;?>">
											<input type="hidden" name="action" value="<?php echo $action;?>">
										
											<button type="submit" name="save" class="btn btn-primary">Save </button>  
										</div>
									</div>
   
                         		</div>
							</form>
							
                        </div>
                    </div>
                </div>
	   
			<script type="text/javascript">
				$( document ).ready( function () {			
			
				$( "#joindate" ).datepicker({
					dateFormat:"yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					yearRange: "1970:<?php echo date('Y');?>"
					});	

				if($("#signupForm1").length > 0)
				{
				
				<?php if($action=='add')
				{
				?>
		 
				$( "#signupForm1" ).validate( {
					rules: {
						iname: "required",
						joindate: "required",
						emailid: "email",
						branch: "required",
					
					contact: {
						required: true,
						digits: true
					},
					idno: {
						required: true,
						digits: true
					},
					salary: {
						required: true,
						digits: true
					},
					
				},
				<?php
				}else
				{
				?>
			
				$( "#signupForm1" ).validate( {
					rules: {
						iname: "required",
						joindate: "required",
						emailid: "email",
						branch: "required",
						idno: {
							required: true,
							digits: true
						},
						
						contact: {
							required: true,
							digits: true
						}
						
					},
			
					<?php
					}
					?>
				
					errorElement: "em",
					errorPlacement: function ( error, element ) {
						// Add the `help-block` class to the error element
						error.addClass( "help-block" );

						// Add `has-feedback` class to the parent div.form-group
						// in order to add icons to inputs
						element.parents( ".col-sm-10" ).addClass( "has-feedback" );

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
						$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
						$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
					},
					unhighlight: function ( element, errorClass, validClass ) {
						$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
						$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
					}
				} );
				
				}
			
				} );
			
			</script>
            <?php
				}else{
            ?>
            <link href="../../css/datatable/datatable.css" rel="stylesheet" />
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Manage Instructors` Details
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-sorting">
                        <table class=" table table-bordered table-striped" id="tSortable22">
                            <thead>
                                <tr>
                                    <th>Instructor No.</th>
                                    <th>Name / Contact</th>
                                    <th>ID Number</th>
                                    <th>DOA</th>
									<th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									$sql = "select * from staff where delete_status='0'";
									$result = $conn->query($sql);
									$i = 1;
									while($r = $result->fetch_assoc()){
										echo '<tr>
												<td>'.$i.'</td>
												<td>'.$r['iname'].'<br/>'.$r['contact'].'</td>
												<td>'.$r['idno'].'</td>
												<td>'.date("d M y", strtotime($r['joindate'])).'</td>
												<td>Active</td>
												<td>
													<a href="staff.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
													<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="staff.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a> 
												</td>
										</tr>';
										$i++;
									}
								?>
                            </tbody>
                        </table>
                    </div>
					
                </div>
            </div>
            <script src="../../js/dataTable/jquery.dataTables.min.js"></script>

			<script>
				$(document).ready(function () {
					$('#tSortable22').dataTable({
						"bPaginate": true,
						"bLengthChange": true,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": true 
					});				
				});
			</script>
			
			<?php
			}
			?>
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
