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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to social network</title>
</head>
<body>
    <div class="container">
        <row class="row mt-4">
            <form action="register.php" method="POST">
                <div class="col-3 mb-2">           
                    <input type="email" class="form-control" name="log_email" placeholder="Email" 
                    value="<?php if(isset($_SESSION['log_email'])) { echo $_SESSION['log_email']; } ?>" required/>                               
                </div> 
                <div class="col-3 mb-2">           
                    <input type="password" class="form-control" name="log_password" placeholder="Password" />                               
                </div>
                <button type="submit" class="btn btn-primary" name="login_btn">Login</button>

                <div class="form-text"><?php if(in_array("Email or password was incorrect", $error_array)) echo "Email or password was incorrect"; ?></div>
            </form>
        </row>
    </div>

   <div class="container">
    <div class="row mt-4">
    <form action="register.php" method="POST">
        <div class="col-3 mb-2">           
            <input type="text" class="form-control" name="reg_fname" placeholder="First Name" 
            value="<?php if(isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; } ?>" required>
            <div class="form-text">
                <?php if(in_array("Your first name must be between 2 and 25 characters", $error_array)) echo "Your first name must be between 2 and 25 characters" ?>
            </div>            
        </div>
        <div class="col-3 mb-2">            
            <input type="text" class="form-control" name="reg_lname" placeholder="Last Name"
            value="<?php if(isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; } ?>" required>
            <div class="form-text">
                <?php if(in_array("Your last name must be between 2 and 25 characters", $error_array)) echo "Your last name must be between 2 and 25 characters" ?>
            </div>
        </div>
        <div class="col-3 mb-2">            
            <input type="email" class="form-control" name="reg_email" placeholder="Email"
            value="<?php if(isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; } ?>" required>            
        </div>
        <div class="col-3 mb-2">
            <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email"
            value="<?php if(isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; } ?>" required>
            <div class="form-text">
                <?php if(in_array("Email already in use", $error_array)) echo "Email already in use";
                else if(in_array("Invalid email format", $error_array)) echo "Invalid email format";
                else if(in_array("Email do not match", $error_array)) echo "Email do not match"; ?>
            </div>
        </div>
        <div class="col-3 mb-2">
            <input type="password" class="form-control" name="reg_password" placeholder="Password" required>
        </div>
        <div class="col-3 mb-2">
            <input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required>
            <div class="form-text">
                <?php if(in_array("Your password do not match", $error_array)) echo "Your password do not match";
                else if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "Your password can only contain english characters or numbers";
                else if(in_array("Your password must be between 5 and 30 characters", $error_array)) echo "Your password must be between 5 and 30 characters"; ?>
            </div>
        </div>        
        <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
        </br>
        <?php if(in_array("<span style='color: #14c800;'>You're all set! Please login!</span></br>", $error_array)) echo "<span style='color: #14c800;'>You're all set! Please login!</span></br>"; ?>
    </form>
    </div>
   </div> 
</body>
</html>