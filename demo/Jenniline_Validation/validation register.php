



<?php

    //Put above HTML

    $nameErr = $emailErr = "";
    $username = $email = $password = $password2 = "";

    $username = test_input($_POST["register"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST['password']);
    $password2 =test_input($_POST['password2']);




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

       if($password != $password2)
     {
        echo "passwords doesn't match" ;
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
        //put below HTML
         echo "<h2>Your given values are as:</h2>";
         echo $name;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $password2;
         echo "<br>";
         
      ?>