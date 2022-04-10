<?php

    $conn = new mysqli("localhost", "root", "","Grocefy");
    $sql = "INSERT INTO CUSTOMER VALUES '".$_POST["name"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["locality"]."','".$_POST["pin"]."','".$_POST["mobile"]."','".$_POST["email"]."','".$_POST["password"]."'";
    

    if ($conn->query($sql) === TRUE) 
    {
        header("Location: ");//login.php
    } 
    else 
    {
        echo '<script> alert("Error in database connection. Try again later"); </script>';
    }


?>
