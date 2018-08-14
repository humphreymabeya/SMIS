<?php
// including the config file
include("../Include/dbconnect.php");
// defining variables and initializing with empty values
$username = $password = $confirm_password = '';
$username_err = $password_err = $confirm_password_err = "";
// processing form data on submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // validating username
    if(empty(trim($_POST['username']))){
        $username_err = "Please enter a username.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                // header("location: login.php");
                echo "<script type=\"text/javascript\">".
                    "alert('User Successfully registered!!');".
                    "location.href='login.php'".
                    "</script>";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMIS | Registration</title>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png" />
    <!-- BOOTSTRAP STYLES-->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
        .view-panel{
            margin-top: 5px;
        }
        img{
            height:100px;width:100px;
        }
        .logo-img{
            text-align:center;margin-top:10px;
        }
        body{
            background:url(../img/background2.jpg);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo-img">
                    <img src="../img/logo.jpg">
                </div>
                <h2 style="text-align:center; color:black;"> Welcome to <strong>School Management Information System</strong> </h2>
                <h3 style="text-align:center; color:black;"><strong>Version 1.0.0 </strong></h3>
            </div>
                </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="view-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register new user</h3> 
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Username:</label>
                                <div class="col-sm-8 <?php echo (!empty($username_err)) ? 'has-error': '';?>">
                                    <input type="text" value="<?php echo $username;?>" name="username" class="form-control" />
                                    <span class = "help-block"><?php echo $username_err;?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="control-label col-sm-4">Password:</label>
                                <div class="col-sm-8 <?php echo (!empty($password_err)) ? 'has-error': '';?>">
                                    <input type="password" value="<?php echo $password;?>" name="password" class="form-control" />
                                    <span class = "help-block"><?php echo $password_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4">Confirm Password:</label>
                                <div class="col-sm-8 <?php echo (!empty($confirm_password_err)) ? 'has-error': '';?>">
                                    <input type="password" value="<?php echo $confirm_password;?>" name="confirm_password" class="form-control" />
                                    <span class = "help-block"><?php echo $confirm_password_err;?></span>
                                </div>
                            </div>
                            <div class = "form-group">
                                <div class="col-sm-8 col-md-offset-4">
                                    <input type = "submit" class = "btn btn-primary" value = "Submit">
                                    <input type = "reset" class = "btn btn-default" value = "Reset">
                                </div>
                            </div>
                            <p>Already have an account?<a href = "login.php">Login here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>