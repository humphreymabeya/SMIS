<?php
  include("../Include/dbconnect.php");

  if(isset($_POST['req']) && $_POST['req']=='1') 
  {

  $sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';

  $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch and  s.delete_status='0' and s.id='".$sid."'";
  $q = $conn->query($sql);
  if($q->num_rows>0)
  {
    $sql = "select introduction,os,msword,msexcel,msaccess,mspowerpoint,mspublishing,internet,submitdate,transaction_remark from exam  where stdid='".$sid."'";
    $fq = $conn->query($sql);
    $result = $fq->fetch_assoc();
    $res = $q->fetch_assoc();
    echo '  <form class="form-horizontal" id ="signupForm1" action="exam.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" disabled  value="'.$res['sname'].'" >
        </div>
      </div>
  
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Contact:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" disabled  value="'.$res['contact'].'" />
        </div>
      </div>
  
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Total Fee:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="totalfee" id="totalfee"   value="'.$res['fees'].'" disabled />
        </div>
      </div>
 
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Balance:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="balance"  id="balance" value="'.$res['balance'].'" disabled />
        <input type="hidden" value="'.$res['id'].'" name="sid">
        </div>
      </div>
    
        <div class="col-sm-12">
          <fieldset class="scheduler-border" >
          <legend  class="scheduler-border">Award Score:</legend>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Introduction:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="introduction"  id="introduction" value="'.$result['introduction'].'" maxlength="3" max="100" />
                    </div>
                </div>
                    
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">O/S:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="os"  id="os" value="'.$result['os'].'" maxlength="3" max="100" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Word Processing:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="msword"  id="msword" value="'.$result['msword'].'" maxlength="3" max="100" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Spreadsheets:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="msexcel"  id="msexcel" value="'.$result['msexcel'].'" maxlength="3" max="100" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Into to DBMS:</label>
                    <div class="col-sm-8">
                            <input type="text" class="form-control" name="msaccess"  id="msaccess" value="'.$result['msaccess'].'" maxlength="3" max="100" />
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Presentations:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="mspowerpoint"  id="mspowerpoint" value="'.$result['mspowerpoint'].'" maxlength="3" max="100" />
                        </div>
                </div>
               <div class="form-group">
                    <label class="control-label col-sm-4" for="email">DTP:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mspublishing"  id="mspublishing" value="'.$result['mspublishing'].'" maxlength="3" max="100" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Internet & Email:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="internet"  id="internet" value="'.$result['internet'].'" maxlength="3" max="100" />
                    </div>
                </div>
            </div>
          </fieldset>
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
					paid: {
						required: true,
						digits: true,
						max:'.$res['balance'].'
					},
					introduction: {
            digits: true,
          },
          os :{
            digits: true,
          },
          msword :{
            digits: true,
          },
          msexcel :{
            digits: true,
          },
          msaccess :{
            digits: true,
          },
          mspowerpoint :{
            digits: true,
          },
          mspublishing :{
            digits: true,
          },
          internet :{
            digits: true,
          },
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10, .col-sm-8" ).addClass( "has-feedback" );

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
					$( element ).parents( ".col-sm-10, .col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10, .col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
        
			} );


  //////////////////////////	
	
	
	
      });

      </script>
      
      ';

    }else
    {
      echo "Something Goes Wrong! Try After some time.";
    }
  }
//   code to output exam result
  if(isset($_POST['req']) && $_POST['req']=='2') 
  {

    $sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';
    $sql = "select introduction,os,msword,msexcel,msaccess,mspowerpoint,mspublishing,internet,submitdate,transaction_remark from exam  where stdid='".$sid."'";
    $fq = $conn->query($sql);
    // $fp = $fq->fetch_assoc();
    if($fq->num_rows>0)
      {
      $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch  and s.id='".$sid."'";
      $sq = $conn->query($sql);
      $sr = $sq->fetch_assoc();
        echo '
        <h4>Student Info</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th>Name</th>
                <td>'.$sr['sname'].'</td>
              <th>Branch</th>
                <td>'.$sr['branch'].'</td>
            </tr>
            <tr>
              <th>Contact</th>
                <td>'.$sr['contact'].'</td>
              <th>Joining Date</th>
                <td>'.date("d-m-Y", strtotime($sr['joindate'])).'</td>
            </tr>
          </table>
        </div>
        ';

        
        
      
  echo '	  
      </tbody>
    </table>
  </div>

  <h4>Examination Score Details</h4>
  <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>Unit Code</th>
            <th>Unit Name</th>
            <th>Score</th>
            <th>Remark</th>
          </tr>
        </thead>
        <tbody>';
        $res = $fq->fetch_assoc();
          echo '<tr>
            <th>P001</th>
            <th>Introduction To Computers</th>
            <td>'.$res['introduction'].'</td>
            <td><b>
              ';
                if($res['introduction'] >= 75 && $res['introduction'] <= 100){
                  echo 'DISTINCTION <br />';
                }else if($res['introduction'] >= 65 && $res['introduction'] <= 74){
                  echo 'CREDIT <br />';
                }else if($res['introduction'] >= 50 && $res['introduction'] <= 64){
                  echo 'PASS <br />';
                }else if($res['introduction'] >= 0 && $res['introduction'] <= 49){
                  echo 'FAIL <br />';
                }
              echo '
            </td>
          </tr>

          <tr>
          <th>P002</th>
            <th>Operating Systems</th>
            <td>'.$res['os'].'</td>
            <td> <b>
            ';
            if($res['os'] >= 75 && $res['os'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['os'] >= 65 && $res['os'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['os'] >= 50 && $res['os'] <= 64){
              echo 'PASS <br />';
            }else if($res['os'] >= 0 && $res['os'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
            <th>P003</th>
            <th>Word Processing</th>
            <td>'.$res['msword'].'</td>
            <td> <b>
            ';
            if($res['msword'] >= 75 && $res['msword'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['msword'] >= 65 && $res['msword'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['msword'] >= 50 && $res['msword'] <= 64){
              echo 'PASS <br />';
            }else if($res['msword'] >= 0 && $res['msword'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
            <th>P004</th>
            <th>Spreadsheets</th>
            <td>'.$res['msexcel'].'</td>
            <td> <b>
            ';
            if($res['msexcel'] >= 75 && $res['msaccess'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['msexcel'] >= 65 && $res['msexcel'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['msexcel'] >= 50 && $res['msexcel'] <= 64){
              echo 'PASS <br />';
            }else if($res['msexcel'] >= 0 && $res['msexcel'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
          <th>P005</th>
            <th>Intro to DBMS</th>
            <td>'.$res['msaccess'].'</td>
            <td> <b>
            ';
            if($res['msaccess'] >= 75 && $res['msaccess'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['msaccess'] >= 65 && $res['msaccess'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['msaccess'] >= 50 && $res['msaccess'] <= 64){
              echo 'PASS <br />';
            }else if($res['msaccess'] >= 0 && $res['msaccess'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
            <th>P006</th>
            <th>Powerpoint Presentations</th>
            <td>'.$res['mspowerpoint'].'</td>
            <td> <b>
            ';
            if($res['mspowerpoint'] >= 75 && $res['mspowerpoint'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['mspowerpoint'] >= 65 && $res['mspowerpoint'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['mspowerpoint'] >= 50 && $res['mspowerpoint'] <= 64){
              echo 'PASS <br />';
            }else if($res['mspowerpoint'] >= 0 && $res['mspowerpoint'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
            <th>P007</th>
            <th>Desktop Publishing</th>
            <td>'.$res['mspublishing'].'</td>
            <td> <b>
            ';
            if($res['mspublishing'] >= 75 && $res['mspublishing'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['mspublishing'] >= 65 && $res['mspublishing'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['mspublishing'] >= 50 && $res['mspublishing'] <= 64){
              echo 'PASS <br />';
            }else if($res['mspublishing'] >= 0 && $res['mspublishing'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>

          <tr>
            <th>P008</th>
            <th>Internet & Email</th>
            <td>'.$res['internet'].'</td>
            <td> <b>
            ';
            if($res['internet'] >= 75 && $res['internet'] <= 100){
              echo 'DISTINCTION <br />';
            }else if($res['internet'] >= 65 && $res['internet'] <= 74){
              echo 'CREDIT <br />';
            }else if($res['internet'] >= 50 && $res['internet'] <= 64){
              echo 'PASS <br />';
            }else if($res['internet'] >= 0 && $res['internet'] <= 49){
              echo 'FAIL <br />';
            }
          echo ' </b>
            </td>
          </tr>
        <tbody>
    </table>
  </div>
  ';

  }
  else
  {
  echo 'No exam score submitted.';
  }
  
  }
		
?>