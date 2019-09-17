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
        //put below HTML
         echo "<h2>Your given values are as:</h2>";
         echo $name;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $password2;
         echo "<br>";
         
      ?>