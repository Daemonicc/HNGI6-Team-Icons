<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 9/16/2019
 * Time: 3:46 PM
 */

session_start();

if(isset($_GET['act'])){
    unset($_SESSION['test-user']);
    header("location:login.php");
    exit();
}

if(isset($_POST['register'])){
    $file = file_get_contents("auth.json");
    $records = json_decode($file,true);

    $username = strtolower($_POST['username']);

    $password = sha1($_POST['password']);




    if(in_array("$username", array_column($records, 'username')) && in_array("$password", array_column($records, 'password'))) {
        $_SESSION['test-user'] = $username;
        $_SESSION['err_msg'] = "<div class='alert alert-success'>Welcome, Login successfully!</div>";
        header("location:home.php");
        exit();
    }else{
        $_SESSION['err_msg'] = "<div class='alert alert-danger'>Invalid login details</div>";
        // header("location:login.php");

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Login</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  <link rel="stylesheet" href="style2.css">
</head>

 <section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8">
                <div class="login_form_inner">
                    <h3>Login to team icon</h3>
                        <form class="row login_form" action="" method="post">
                            <?php
                                if(isset($_SESSION['err_msg'])) {
                                    echo $_SESSION['err_msg'];
                                    unset($_SESSION['err_msg']);
                                }
                            ?>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-user icon"></i>
                            </div> 
                            <input type="text" name="username" required class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-lock icon"></i>
                            </div>
                            <input type="password" name="password" required class="form-control" placeholder=" Password"onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div id="alternateword">
                            <h6 id="left-word" class="float-right">Forgot Password?</h6>
                            <h6 id="center-word"> New user? <a href="register.php">Sign Up</a></h6>
                        </div>
                        <div id="socials">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-google-plus-g"></i>
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                        <div class="button-group text-center">
                            <button type="submit" name="register" class="btn btn-default submit-btn">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 d-none d-md-block">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>HELLO FRIEND!</h4>
                        <p>Enter personal details and start<br> a journey with us</p>
                        <a class="button button-account" href="register.php">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
<script src="https://kit.fontawesome.com/66a27d438b.js"></script>
</html>
