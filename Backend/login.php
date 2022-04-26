<?php

    $conn = new mysqli("localhost", "root", "","Grocefy");
    $sql = "SELECT password from customer where email = '".$_POST["email"]."'";
    

    if($result = $conn->query($sql))
    {
        while ($row = $result->fetch_assoc()) 
        {
            header("Location: ./shops.html");
        }
    }
    else
    {
        
        header("Location: ./login.html");
        
    }


?>
