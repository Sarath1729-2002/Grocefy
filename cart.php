<?php
    session_start();    
    $n = sizeof($_SESSION["pcode"]);
    
    $conn = new mysqli("localhost", "root", "","Grocefy");
    $total = 0;
    function delete($x, $n)
    {
        for($i = 0; $i<$n;$i++)
        {
            if($x < $i)
            {
                $_SESSION["pcode"][$i-1] = $_SESSION["pcode"][$i];
                $_SESSION["qty"][$i-1] = $_SESSION["qty"][$i];
            }

        }
    }
    for($i = 0;$i<$n;$i++)
    {
        $pcode = $_SESSION["pcode"][$i];
        $qty = $_SESSION["qty"][$i];
        $msg;
        $flag = 0;
        $img =  "pics iwp preoject/ABC_Groceries/".$pcode.".png";
        $sql = "SELECT * from abc_groceries where p_code = '".$pcode."'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $name = $row["product"];
            $qis = $row["qty_in_stock"];
            $price = $row["price"];
        }
        if($qis < $qty)
        {
            $flag = 1;
            $msg = "<h5> Not enough quantity in stock !. We will get back to you for the remaining quantity once the stock is replenished";
            $qty = $qis;
        }
        $cost = $qty*$price;
        $total+= $cost;
        echo "
            <div class='swiper-slide box'> ";
            echo "<img src = '".$img."'>";
            if($flag == 1){
                echo $msg;
            }
            echo"    <h3>$name</h3>
                <div class='price'> $price </div>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star-half-alt'></i>
                    </div>
                    <form method='post'>
                        <input type='submit' name='Delete from cart' class='button' value='Delete' />
                    </form>
                    ";
        if (array_key_exists('Delete', $_POST)) 
        {
            delete($i,$n);
            header("Location: cart.php");
        }
                "</div>
            </div>";

        

    }
    //$_SESSION["pcode"] = array();
    //$_SESSION["qty"]= array();
?>