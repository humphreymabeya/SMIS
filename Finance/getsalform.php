<?php
    include("../Include/dbconnect.php");
  
    if(isset($_POST['req']) && $_POST['req']=='1') 
    {
      $sid = (isset($_POST['staff']))?mysqli_real_escape_string($conn,$_POST['staff']):'';
      $sql = "select s.id,s.iname,s.idno,s.salary,s.contact,b.branch,s.joindate from staff as s,branch as b where b.id=s.branch and  s.delete_status='0' and s.id='".$sid."'";
      $q = $conn->query($sql);
      if($q->num_rows>0)
      {
  
      $res = $q->fetch_assoc();
      echo '  <form class="form-horizontal" id ="signupForm1" action="salary.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="Email">Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" disabled  value="'.$res['iname'].'">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="Email">Contact:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled  value="'.$res['contact'].'">
                </div>
            </div>
        
            <div class="form-group">
                <label class="control-label col-sm-2" for="Email">ID Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled  value="'.$res['idno'].'"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Email">Gross Pay (mnth)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="'.$res['salary'].'" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Email">Salary Paid:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="salary_paid" name="salary_paid" />
                    <input type="hidden" value="'.$res['id'].'" name="sid">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Month:</label>
                <div class="col-sm-4">
                    <select class="form-control" id="month" name="month">
                        <option value="">Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <label class="control-label col-sm-2" for="Email">Year:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="year" id="year">
                        <option value="">Select year</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Date:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="submitdate"  id="submitdate" style="background:#fff;"  readonly />
                </div>
            </div>
    
    
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Remark:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="transaction_remark" id="transaction_remark"></textarea>
                </div>
            </div>
   
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
            </div>
      </form>
  
      <script type="text/javascript">
        $(document).ready( function() {
          $("#submitdate").datepicker( {
                  changeMonth: true,
                  changeYear: true,
                
                  dateFormat: "yy-mm-dd",
                
              });
  
          ///////////////////////////
  
          $( "#signupForm1" ).validate( {
            rules: {
              submitdate: "required",
              month: "required",
              year: "required",
              
              salary_paid: {
                required: true,
                digits: true,
                max:'.$res['salary'].'
              },  
              
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
              // Add the `help-block` class to the error element
              error.addClass( "help-block" );
  
              // Add `has-feedback` class to the parent div.form-group
              // in order to add icons to inputs
              element.parents( ".col-sm-10, .col-sm-4" ).addClass( "has-feedback" );
  
              if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
              } else {
                error.insertAfter( element );
              }
  
              
              if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class=\'glyphicon glyphicon-remove form-control-feedback\'></span>" ).insertAfter( element );
              }
            },
            success: function ( label, element ) {
              if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class=\'glyphicon glyphicon-ok form-control-feedback\'></span>" ).insertAfter( $( element ) );
              }
            },
            highlight: function ( element, errorClass, validClass ) {
              $( element ).parents( ".col-sm-10, .col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
              $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
              $( element ).parents( ".col-sm-10, .col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
              $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
            }
                });
          //////////////////////////	
        });
  
      </script>
        ';
  
      }else
      {
        echo "Something Goes Wrong! Try After sometime.";
      }
    }
    // generate report
    if(isset($_POST['req']) && $_POST['req']=='2') 
    {
        $sid = (isset($_POST['staff']))?mysqli_real_escape_string($conn,$_POST['staff']):'';
        $sql = "select salary_paid,pay_month,pay_year,submitdate,transaction_remark from salary_payment  where staffid='".$sid."'";
        $fq = $conn->query($sql);
        if($fq->num_rows>0)
        {
            $sql = "select s.id,s.iname,s.idno,s.salary,s.contact,b.branch,s.joindate from staff as s,branch as b where b.id=s.branch  and s.id='".$sid."'";
            $sq = $conn->query($sql);
            $sr = $sq->fetch_assoc();
            echo '
                <h4>Personal Information</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>'.$sr['iname'].'</td>
                            <th>ID Number </th>
                            <td>'.$sr['idno'].'</td>
                            <th>Staff Number</th>
                            <td>'.$sr['id'].'</td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                                <td>'.$sr['contact'].'</td>
                            <th>Branch</th>
                                <td>'.$sr['branch'].'</td>
                            <th>Joining Date</th>
                                <td>'.date("d-m-Y", strtotime($sr['joindate'])).'</td>
                        </tr>
                    </table>
                </div>
            ';
            // modal content
            echo '
                <h4>Overall Salary Payment Summary</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date of Payment</th>
                                <th>Amount Paid</th>
                                <th>Month of Pay</th>
                                <th>Year</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>';
                            while($res = $fq->fetch_assoc()){
                                echo '
                                    <tr>
                                        <td>'.date("d-m-Y", strtotime($res['submitdate'])).'</td>
                                        <td>'.$res['salary_paid'].'</td>
                                        <td>'.$res['pay_month'].'</td>
                                        <td>'.$res['pay_year'].'</td>
                                        <td>'.$res['transaction_remark'].'</td>
                                    </tr>
                                ';
                            }
                        echo '
                        </tbody>
                    </table>
                </div>
            ';
        }
        else{
            echo 'No data Submitted or fetched!';
        }
    }
?>