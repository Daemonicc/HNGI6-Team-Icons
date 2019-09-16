<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 9/16/2019
 * Time: 4:18 PM
 */


session_start();

if(!isset($_SESSION['test-user'])){
    $_SESSION['err_msg'] = "<div class='alert alert-danger'>Please login first!</div>";
    header("location:login.php");
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
                    <div class="panel-heading">Welcome</div>
                    <div class="panel-body">
                        <?php
                        if(isset($_SESSION['err_msg'])) {
                            echo $_SESSION['err_msg'];
                            unset($_SESSION['err_msg']);
                        }
                        ?>
                        <h3>
                            Welcome <?php echo $_SESSION['test-user'];?>
                        </h3>
                        <p>
                            <a href="login.php?act=logout" class="btn btn-danger">Logout</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

