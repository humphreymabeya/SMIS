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
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Month:</label>
                <div class="col-sm-4">
                    <select class="form-control" id="month" name="month">
                        <option value="">Select Month</option>
                        <option value="">January</option>
                        <option value="">February</option>
                        <option value="">March</option>
                        <option value="">April</option>
                        <option value="">June</option>
                        <option value="">July</option>
                        <option value="">August</option>
                        <option value="">September</option>
                        <option value="">October</option>
                        <option value="">November</option>
                        <option value="">December</option>
                    </select>
                </div>
                <label class="control-label col-sm-2" for="Email">Year:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="year" id="year">
                        <option value="">Select year</option>
                        <option value="">2017</option>
                        <option value="">2018</option>
                        <option value="">2019</option>
                        <option value="">2020</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                        <option value="">2023</option>
                        <option value="">2024</option>
                        <option value="">2024</option>
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
                    <textarea class="form-control" name="transcation_remark" id="transcation_remark"></textarea>
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
              
              salary_paid: {
                required: true,
                digits: true,
                max:'.$res['salary'].'
              }	
              
              
            },
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
              $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
              $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
              $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
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
?>