<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP 1</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <link rel="stylesheet" href="CSS/shop1.css">
    <?php
        session_start();
        if(!is_array($_SESSION['pcode'])) {
            $_SESSION['pcode']=array();
        }
        if(!is_array($_SESSION['qty'])) {
            $_SESSION['qty']=array();
        }
    ?>
</head>
<body>
    




<section class="products" id="products">

    <h1 class="heading"> our <span>products</span> </h1>
    <?php
        
        
        $conn = new mysqli("localhost", "root", "","Grocefy");
        $query_count = "SELECT * from abc_groceries";
        $data = $conn->query($query_count);
        $size = mysqli_num_rows($data);
        $name = "xxx";
        $price = 100;
        $qty = 100;
        for ($i = 0; $i < $size; $i++) 
        {
            $n = $i+1;
            $pc = "p00".$n;
            $query = "SELECT * from abc_groceries where p_code = '".$pc."'";
            $result_query = $conn->query($query);
            while ($row = $result_query->fetch_assoc())
            {
                $name = $row["product"];
                $price = $row["price"];
                $qty = $row["qty_in_stock"];
                $img = "pics iwp preoject/ABC_Groceries/".$pc.".png";
                
            }
            $items[$i] = $pc;
            echo "
            <div class='swiper-slide box'> ";
            echo "<img src = '".$img."'>";
            echo"    <h3>$name</h3>
                <div class='price'> $price </div>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star-half-alt'></i>
                    </div>
                    <form class='add-to-cart' action='' method='post'>
                        <div>
                            <label for='qty'>Quantity</label>
                            <input type='text' name='qty' id='qty' class='qty' value='1' /><br>
                            <label for='P Code'>Product Code :</label>  
                            <input type='text' id='pcode' name='pcode' value = '".$pc."' readonly>
                        </div>
                        <p><input type='submit' name = 'submit' value='Add to cart' class='btn' /></p>
                    </form>";
                    
                "</div>
            </div>";

            
            
            
            
        }
        if (isset($_POST['submit'])) 
        { 
            array_push($_SESSION["pcode"],$_POST["pcode"]);
            array_push($_SESSION["qty"],$_POST["qty"]);
                
        } 
        
    ?>
    
</section>



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="shop1.js"></script>


</body>
</html>
