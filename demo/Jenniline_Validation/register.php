<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 9/16/2019
 * Time: 3:46 PM
 */

$nameErr = $emailErr = "";
$username = $email = $password = $password2 = "";

$username = test_input($_POST["register"]);
$email = test_input($_POST["email"]);
$password = test_input($_POST['password']);
$password2 =test_input($_POST['password2']);




        if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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

        if (empty($_POST["email"]))
        {
            $emailErr = "Email is required";
            echo $emailErr;    
        }

        else 
        {
                    $email = test_input($_POST["email"]);
                // $email = $_POST["email"];

                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                    $emailErr = "Invalid email format"; 
                    echo $emailErr;
                    }
            }

        if($password=='' && strlen ($password)<6)
        {
        // echo "<script>alert('Please enter  Password')</script>";
            echo "Please enter password";
        exit();
        }   
        
        if($password2=='')
        {
            //  echo "<script>alert('Please enter Confirm Password')</script>";
                echo "Please enter Password Confirmation";
        }

        /* if($password != $password2)
        {
            echo "passwords doesn't match" ;
        }*/

}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>









<?php

session_start();
if(isset($_POST['register'])){
    $file = file_get_contents("auth.json");
    $records = json_decode($file,true);
    $username = strtolower($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2){
        $_SESSION['err_msg'] = "<div class='alert alert-warning'>Password does not match</div>";
        header("location:register.php");
        exit();
    }


    /*for($i = 0; $i < count($records); $i++){
        $uname = $records[$i]['username'];

        if($uname == $username){
            $_SESSION['err_msg'] = "<div class='alert alert-warning'>Username already exists!</div>";
            header("location:register.php");
            exit();
        }

    }*/

    if(in_array("$username", array_column($records, 'username'))) {
        $_SESSION['err_msg'] = "<div class='alert alert-warning'>Username already exists!</div>";
        header("location:register.php");
        exit();
    }



    //exit();

    $datas = array(
        'username' => $username,
        'email' => $email,
        'password' => sha1("$password")
    );
    //$data[$username] = $datas;

    array_push($records,$datas);

    $record = json_encode($records, JSON_PRETTY_PRINT);

    file_put_contents("auth.json",$record);
    //var_dump($records);
    $_SESSION['err_msg'] = "<div class='alert alert-success'>Registration Successful</div>";
    header("location:register.php");
    exit();
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
                    <div class="panel-heading">Register</div>
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
                                <label for="email">Email Address</label>
                                <input type="email" name="email" required id="email" placeholder="Email Address" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" required class="form-control" id="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input type="password" name="password2" required class="form-control" id="password2" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="register" class="btn btn-success" value="Sign Up">
                            </div>

                            <p>
                                Already a user? <a href="login.php">Login</a>
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
