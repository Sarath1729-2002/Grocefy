<?php

    $conn = new mysqli("localhost", "root", "","Grocefy");
    $sql = "SELECT password from customers where email = '".$_POST["email"]."'";
    $result = $conn->query($sql);

    $flag = 0;
    while ($row1 = $result->fetch_assoc())
    {
    if($row1["password"] == $_POST["password"])
    {
        header("Location: ");//shops.html
        exit();
    }
    else
    {
        echo '<script> alert("Incorrect Passoword or Login Email"); </script>';
    }
}

?>
