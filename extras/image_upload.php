<?php
      if(isset($_POST["submit"]))
      {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false){
              $image = $_FILES['image']['tmp_name'];
              $imgContent = addslashes(file_get_contents($image));

            /*
             * Insert image data into database
             */

            //DB details
            $dbHost     = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName     = 'Grocefy';

            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            // Check connection
            if($db->connect_error)
            {
                die("Connection failed: " . $db->connect_error);
            }

            $pcode = $_POST["pcode"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $qty = $_POST["qty"];
            
            //Insert image content into database
            $insert = $db->query("INSERT into ABC_groceries VALUES ('$pcode', '$name','$price','$qty','$image')");
            if($insert){
                echo "File uploaded successfully.";
            }else{
                echo "File upload failed, please try again.";
            } 
        }else{
            echo "Please select an image file to upload.";
        }
    }
    ?>