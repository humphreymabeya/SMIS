<?php
include("../Include/dbconnect.php");
// define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// processing form data on submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // check if username is empty
    if(empty(trim($_POST['username']))){
        $username_err = "Please enter username.";
    }else{
        $username = trim($_POST['username']);
    }
    // check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter your password";
    }else{
        $password = trim($_POST['password']);
    }
    // validating credentials
    if(empty($username_err) && empty($password_err)){
        // generating a SELECT statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            // session_start();
                            $_SESSION['username'] = $username;      
                            header("location: ../index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>SMIS | Sign in</title>
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
                        <h3 class="panel-title">Login here</h3> 
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

                            
                            <div class = "form-group">
                                <div class="col-sm-8 col-md-offset-4">
                                    <input type = "submit" class = "btn btn-primary" value = "Login">
                                </div>
                            </div>
                            <p>Don`t have an account? <a href = 'register.php'>Sign up now</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>