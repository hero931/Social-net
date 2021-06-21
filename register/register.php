<?php
    require '../config/config.php';
    require '../includes/form_handlers/register_handler.php';
    require '../includes/form_handlers/login_handler.php';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/register.js"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to social network</title>
</head>
<body>

    <?php
        if(isset($_POST['register_btn'])) {
            echo '
                <script>
                    $(document).ready(function() {
                        $("#first").hide();
                        $("#second").show();
                    });
                </script>
            ';
        }
    ?>

    <div class="wrapper">
        <div class="login_box"> 
            <div class="login_header">
                <h1>Social Net</h1>
                <p>Login or Sing up below!</p>
            </div>       
                    <div id="first">
                        <form action="register.php" method="POST">                                  
                                <input type="email" class="form-control" name="log_email" placeholder="Email" 
                                value="<?php if(isset($_SESSION['log_email'])) { echo $_SESSION['log_email']; } ?>" required/><br>                                  
                                <input type="password" class="form-control" name="log_password" placeholder="Password" /><br> 
                                <div><?php if(in_array("Email or password was incorrect", $error_array)) echo "Email or password was incorrect"; ?></div>
                                <button type="submit" name="login_btn">Login</button> 
                                <br>
                                <a href="#" id="signup" class="signup">Need an account? Register here!</a>                           
                        </form>
                    </div>
                    <div id="second">
                        <form action="register.php" method="POST">                                  
                            <input type="text"  name="reg_fname" placeholder="First Name" 
                            value="<?php if(isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; } ?>" required>
                            <div>
                                <?php if(in_array("Your first name must be between 2 and 25 characters", $error_array)) echo "Your first name must be between 2 and 25 characters" ?>
                            </div>                             
                            <input type="text" name="reg_lname" placeholder="Last Name"
                            value="<?php if(isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; } ?>" required>
                            <div>
                                <?php if(in_array("Your last name must be between 2 and 25 characters", $error_array)) echo "Your last name must be between 2 and 25 characters" ?>
                            </div>                               
                            <input type="email" name="reg_email" placeholder="Email"
                            value="<?php if(isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; } ?>" required><br>            
                    
                            <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email"
                            value="<?php if(isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; } ?>" required>
                            <div>
                                <?php if(in_array("Email already in use", $error_array)) echo "Email already in use";
                                else if(in_array("Invalid email format", $error_array)) echo "Invalid email format";
                                else if(in_array("Email do not match", $error_array)) echo "Email do not match"; ?>
                            </div>
                        
                            <input type="password" name="reg_password" placeholder="Password" required><br>
                        
                            <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                            <div>
                                <?php if(in_array("Your password do not match", $error_array)) echo "Your password do not match";
                                else if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "Your password can only contain english characters or numbers";
                                else if(in_array("Your password must be between 5 and 30 characters", $error_array)) echo "Your password must be between 5 and 30 characters"; ?>
                            </div>
                            
                            <button type="submit" name="register_btn">Register</button>
                            </br>
                        <?php if(in_array("<span style='color: #14c800;'>You're all set! Please login!</span></br>", $error_array)) echo "<span style='color: #14c800;'>You're all set! Please login!</span></br>"; ?>
                        <a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
                        </form>
                    </div>                                    
        </div>
    </div> 
</body>
</html>