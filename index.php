<?php
// Include config file
require_once 'config.php';
require_once 'des.php';


// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password== $pass){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            echo '<script type = "text/javascript">
									location.replace("home.php");
									</script>';
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
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>


      <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
	<center>
	<div class="container">
		<div class="imgBx">
			<img src="supply1.png">
		</div>
    <div class="loginBox">
		<h3>Sign in Here!</h3>
           
            
            <form class="form-signin" action= "" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <div class="inputBox">
				<input type="text" id="inputUsername" class="form-control" placeholder="Username" value=""  name="username">
                <span class="fa fa-user"><?php echo $username_err; ?></span>
				</div>
				<div class="inputBox">
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" value="" name="password">
                <span class="fa fa-lock"><?php echo $password_err; ?></span>
				</div>
				<div id="remember" class="checkbox">
                   
                </div>
                 
				<input type="submit" name="" value="Login">
            </form><!-- /form -->
      <!-- /card-container -->
    </div>
	</center>
	<!-- /container -->
	 



</body>

</html>