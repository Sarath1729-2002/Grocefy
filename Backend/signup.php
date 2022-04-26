<?php
    $name = $_POST["name"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $loc = $_POST["loc"];
    $pin = $_POST["pin"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $conn = new mysqli("localhost", "root","","Grocefy");
    if ($conn->connect_error) 
    {
        die('<script> alert("Error in database connection. Try again later"); </script>');
        header("Location: ./login.html");
    }
    
      
    

    $sql = "INSERT INTO CUSTOMER VALUES ('".$name."', '".$email."', '".$phone."', '".$add1."', '".$add2."', '".$loc."', '".$pin."', '".$pass."')";    

    if ($conn->query($sql)) 
    {
        echo ('<script> alert("Account creation successful !!!"); </script>');
        header("Location: ./shops.html");
    }
    else 
    {
        echo ('<script> alert("Error in database updation. Try again later"); </script>');
        header("Location: ./login.html");
    }


?>
