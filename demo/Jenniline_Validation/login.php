
<?php

//Put above HTML

$nameErr = "";
$username = $password = "";

$username = test_input($_POST["register"]); 
$password = test_input($_POST['password']);





if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["username"])) 
 {
    $nameErr = "Name is required";
    echo $nameErr;
 }
 
 else 
 {
    $username = test_input($_POST["username"]);
    //$username = $_POST["username"];
 }


 if($password=='' && strlen ($password)<6)
 {
   // echo "<script>alert('Please enter  Password')</script>";
    echo "Please enter password";
   exit();
 }   
   
}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>

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
        //header("location:login.php");

    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Team Icon</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
 <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Team Icon</a>
        </div>

        </div><!-- /.navbar-collapse -->
    </nav>


<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading">Account Login</div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <?php
                                if(isset($_SESSION['err_msg'])) {
                                    echo $_SESSION['err_msg'];
                                    unset($_SESSION['err_msg']);
                                }
                            ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required placeholder="Team Icon">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" required class="form-control" id="password" placeholder="Password">
                            </div>


                            <div class="form-group">
                                <input type="submit" name="register" class="btn btn-success" value="Login">
                            </div>

                            <p>
                                New user? <a href="register.php">Sign Up</a>
                            </p>
                        </form>
                        <?php
                            //put below HTML
                            echo "<h2>Your given values are as:</h2>";
                            echo $name;
                            echo "<br>";
                            
                            echo $email;
                            echo "<br>";
                            
                            echo $password2;
                            echo "<br>";
                            
                             ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
