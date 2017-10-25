<?php
    $connection = mysqli_connect("localhost","root","","hstore");
    if(isset($_GET['action']) && $_GET['action']=="add"){

        $id=intval($_GET['id']);

        if(isset($_SESSION['cart'][$id])){

            $_SESSION['cart'][$id]['quantity']++;

        }else{
            $sql="SELECT products.id as id_product, p_name, p_amount,specs, man_name FROM products inner join
            manufecturer on products.man_id = manufecturer.id where products.id={$id}";
            $result = mysqli_query($connection, $sql);
            if(isset($result)){
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

                $_SESSION['cart'][$row['id_product']]=array(
                        "quantity" => 1,
                        "man_name" => $row['man_name']
                    );


            }
        }
        else{

                $message="This product id it's invalid!";

            }

        }

    }

?>
    <h1>Product List</h1>
    <?php
        if(isset($message)){
            echo "<h2>$message</h2>";
        }
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Specifications</th>
            <th>Amount</th>
            <th>Manufecturer</th>
        </tr>

        <?php

            $sql="SELECT products.id as id_product, p_name, p_amount,specs, man_name FROM products inner join manufecturer on products.man_id = manufecturer.id";
            $result = mysqli_query($connection, $sql);
            
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

        ?>
            <tr>
                <td><?php echo $row['p_name'] ?></td>
                <td><?php echo $row['specs'] ?></td>
                <td><?php echo $row['p_amount'] ?></td>
                <td><?php echo $row['man_name'] ?></td>
                <td><a href="orderproduct.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Add to cart</a></td>
            </tr>
        <?php

            }

        ?>

    </table>
