<?php
    include("../Include/dbconnect.php");
    include("../Include/checklogin.php");
    $errormsg = '';
    $branch = '';
    if(isset($_POST['save'])){
        $salary_paid = mysqli_real_escape_string($conn, $_POST['salary_paid']);
        $year_of_pay = mysqli_real_escape_string($conn, $_POST['year']);
        $month_of_pay = mysqli_real_escape_string($conn, $_POST['month']);
        $transaction_remark = mysqli_real_escape_string($conn, $_POST['transaction_remark']);
        $submitdate = mysqli_real_escape_string($conn,$_POST['submitdate']);
        $sid = mysqli_real_escape_string($conn,$_POST['sid']);
        $sql = "SELECT salary from staff WHERE id = '$sid'";
        $sq = $conn->query($sql);
        $sr = $sq->fetch_assoc();
        $totalsalry = $sr['salary'];
        if($sr['salary']>0){
            // insert into database
            $sql = "INSERT INTO salary_payment (staffid, salary_paid, pay_month, pay_year, submitdate, transaction_remark) VALUES ('$sid', '$salary_paid', '$month_of_pay', '$year_of_pay', '$submitdate', '$transaction_remark')";
            $conn->query($sql);
            echo '<script type="text/javascript">window.location="salary.php?act=pay";</script>';
        }
        
    }
    // execute act 1
    if(isset($_REQUEST['act']) && @$_REQUEST['act'] == "pay"){
        $errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Salary Payment transacted successfully</div>";
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Process Salaries | SMIS</title>
    <?php include("../Include/links.php"); ?>
    <link href="../../css/print.css" rel="stylesheet" />   	
    <script src="../../js/print.js"></script>
</head>
<?php
    include("../Include/header.php");//navbar interface
?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Salaries Payment Information</h1>
                </div>
            </div>

            <?php
                echo $errormsg;
            ?>
            <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <fieldset class="scheduler-border" >
                            <legend  class="scheduler-border">Search:</legend>
                            <form class="form-inline" role="form" id="searchform">
                                <div class="form-group">
                                    <label for="email">Name</label>
                                    <input type="text" class="form-control" id="staff" name="staff">
                                </div>
  
                                <div class="form-group">
                                    <label for="email"> DOJ </label>
                                    <input type="text" class="form-control" id="doj" name="doj" >
                                </div>
  
                                <div class="form-group">
                                    <label for="email"> Branch </label>
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
  
                                <button type="button" class="btn btn-success btn-sm" id="find" > Find </button>
                                <button type="reset" class="btn btn-danger btn-sm" id="clear" > Clear </button>
                            </form>
                        </fieldset>
                    </div>
            </div>
            <!-- jquery form validation -->
            <script type="text/javascript">
                    $(document).ready( function() {
                      /*
                        $('#doj').datepicker( {
                                changeMonth: true,
                                changeYear: true,
                                showButtonPanel: false,
                                dateFormat: 'mm/yy',
                                onClose: function(dateText, inst) { 
                                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                                }
                        });
	
                            */
                                
                            /******************/	
                        $("#doj").datepicker({
                            
                            changeMonth: true,
                            changeYear: true,
                            showButtonPanel: true,
                            dateFormat: 'mm/yy',
                            onClose: function(dateText, inst) {
                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
                                    }
                        });

                        $("#doj").focus(function () {
                            $(".ui-datepicker-calendar").hide();
                            $("#ui-datepicker-div").position({
                                my: "center top",
                                at: "center bottom",
                                of: $(this)
                            });
                        });
                        setTimeout(function(){
                            $(".alert").fadeTo(700,0).slideUp(700, function(){
                                $(this).remove();
                            });
                        },2000);
                        /*****************/
	
                        $('#staff').autocomplete({
                            source: function( request, response ) {
                                $.ajax({
                                    url : '../data-tables/ajax.php',
                                    dataType: "json",
                                    data: {
                                        name_startsWith: request.term,
                                        type: 'staffname'
                                        },
                                    success: function( data ) {                               
                                        response( $.map( data, function( item ) {                                   
                                            return {
                                                label: item,
                                                value: item
                                            }
                                        }));
                                    }
	
                                });
                            }
                            /*,
                            autoFocus: true,
                            minLength: 0,
                            select: function( event, ui ) {
                                    var abc = ui.item.label.split("-");
                                    //alert(abc[0]);
                                    $("#student").val(abc[0]);
                                    return false;

                                    },
                                  */
		                });
                        $('#find').click(function () {
                            mydatatable();
                        });
                        $('#clear').click(function () {
                            $('#searchform')[0].reset();
                            mydatatable();
                        });
                                    
                        function mydatatable()
                        {
                            $("#subjectresult").html('<table class="table table-striped table-bordered table-hover" id="tSortable22"><thead><tr><th>Name/Contact</th><th>ID Number</th><th>Salary</th><th>Branch</th><th>DOJ</th><th>Action</th></tr></thead><tbody></tbody></table>');                              
                            $("#tSortable22").dataTable({
                                'sPaginationType' : 'full_numbers',
                                "bLengthChange": false,
                                "bFilter": false,
                                "bInfo": false,
                                'bProcessing' : true,
                                'bServerSide': true,
                                'sAjaxSource': "../../data-tables/datatable.php?"+$('#searchform').serialize()+"&type=salarysearch",
                                'aoColumnDefs': [{
                                    'bSortable': false,
                                    'aTargets': [-1] /* 1st one, start by the right */
                                }]
                            });
                        }
		
                            ////////////////////////////
                        $("#tSortable22").dataTable({                                           
                            'sPaginationType' : 'full_numbers',
                            "bLengthChange": false,
                            "bFilter": false,
                            "bInfo": false,                       
                            'bProcessing' : true,
                            'bServerSide': true,
                            'sAjaxSource': "../../data-tables/datatable.php?type=salarysearch",                                          
                            'aoColumnDefs': [{
                                'bSortable': false,
                                'aTargets': [-1] /* 1st one, start by the right */
                            }]
                        });

                            ///////////////////////////		                                
                    });

                    function GetSalaryForm(sid)
                    {
                        $.ajax({
                            type: 'post',
                            url: 'getsalform.php',
                            data: {staff:sid,req:'1'},
                            success: function (data) {
                                $('#formcontent').html(data);
                                $("#myModal").modal({backdrop: "static"});
                            }
                        });
                    }

                    function GetSalarySummary(sid)
                    {
                        $.ajax({
                            type: 'post',
                            url: '../Finance/getsalform.php',
                            data: {staff:sid,req:'2'},
                            success: function (data) {
                                $('#formcontent1').html(data);
                                $("#myModal1").modal({backdrop: "static"});
                            }     
                        });     
                }

            </script>

            <style>
                #doj .ui-datepicker-calendar
                {
                    display:none;
                }
            </style>

            <div class="panel panel-primary">
                <div class="panel-heading">
                            Manage Salary Details  
                </div>
                <div class="panel-body">
                    <div class="table-sorting table-responsive" id="subjectresult">
                        <table class="table table-striped table-bordered table-hover" id="tSortable22">
                            <thead>
                                <tr>
                                          
                                    <th>Name/Contact</th>                                            
                                    <th>ID Number</th>
									<th>Gross Salary(mnth)</th>
									<th>Branch</th>
									<th>DOJ</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
	        <!-------->
	        <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Salary Payments</h4>
                        </div>
                        <div class="modal-body" id="formcontent">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="modal fade modalprinter printable" id="myModal1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="col-12 modal-title text-center">Employee Salary Slip Summary</h4>
                        </div>
                        <div class="modal-body" id="formcontent1">
                        
                        </div>
                        <div class="modal-footer">
                            <span class="pull-right"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></span>
                            <span class="pull-left"><button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button></span>
                        </div>
                    </div>
                </div>
            </div>	
            
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
    <script src="../../js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../../js/custom1.js"></script>
</body>
</html>
