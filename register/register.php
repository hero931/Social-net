<?php
    require '../config/config.php';

    $fname = "";
    $lname = "";
    $em = "";
    $em2 = "";
    $password = "";
    $password2 = "";
    $date = "";
    $error_array = array();

    if(isset($_POST['register_btn'])) {

        $fname = strip_tags($_POST['reg_fname']);
        $fname = str_replace(' ', '', $fname);
        $fname = ucfirst(strtolower($fname));
        $_SESSION['reg_fname'] = $fname;

        $lname = strip_tags($_POST['reg_lname']);
        $lname = str_replace(' ', '', $lname);
        $lname = ucfirst(strtolower($lname));
        $_SESSION['reg_lname'] = $lname;

        $em = strip_tags($_POST['reg_email']);
        $em = str_replace(' ', '', $em);
        $em = ucfirst(strtolower($em));
        $_SESSION['reg_email'] = $em;

        $em2 = strip_tags($_POST['reg_email2']);
        $em2 = str_replace(' ', '', $em2);
        $em2 = ucfirst(strtolower($em2));
        $_SESSION['reg_email2'] = $em2;

        $password = strip_tags($_POST['reg_password']);
        $password2 = strip_tags($_POST['reg_password2']);

        $date = date("Y-m-d");

        if($em == $em2) {
            if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

                $num_rows = mysqli_num_rows($e_check);

                if($num_rows > 0) {
                    array_push($error_array, "Email already in use");
                }

            } else {
                array_push($error_array, "Invalid email format");
            }
        }
         else {
            array_push($error_array, "Email do not match");;
        }

        if(strlen($fname) > 25 || strlen($fname) < 2) {
            array_push($error_array, "Your first name must be between 2 and 25 characters");
        }

        if(strlen($lname) > 25 || strlen($lname) < 2) {
            array_push($error_array, "Your last name must be between 2 and 25 characters");
        }

        if($password != $password2) {
            array_push($error_array, "Your password do not match");
        } 
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)) {
                array_push($error_array, "Your password can only contain english characters or numbers");
            }
        }

        if(strlen($password) > 30 || strlen($password) < 5) {
            array_push($error_array, "Your password must be between 5 and 30 characters");
        }

        if(empty($error_array)) {
            $password = md5($password);

            $username = strtolower($fname . "_" . $lname);
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

            $i = 0;
            while(mysqli_num_rows($check_username_query) != 0) {
                $i++;
                $username = $username . "_" . $i;
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            }

            $profile_pic = "assets/images/profile_pics/defaults/head_wisteria.png";

            $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
            array_push($error_array, "<span style='color: #14c800;'>You're all set! Please login!</span></br>");

            $_SESSION['reg_fname'] = "";
            $_SESSION['reg_lname'] = "";
            $_SESSION['reg_email'] = "";
            $_SESSION['reg_email2'] = "";
        }
    }
    
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