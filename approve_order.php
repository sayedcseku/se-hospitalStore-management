<?php
include_once 'controller/product.php';
session_start();
$_Product = new Product();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
if(isset($_POST['approve']))
{

	$order_id = $_POST['order_no'];
    $g_amount = $_POST['g_amount'];
    $c_amount = $_POST['c_amount'];
    $product_id = $_POST['p_id'];
    $Result = $_Product->approveOrder($order_id, $product_id,$g_amount,$c_amount);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Approval</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <?php include_once 'template/header.php'; ?>
    </header>

    <div class="panel panel-body">

    <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">
    <?php


    $Result = $_Product->getAllOrder();

    //if DAO access is successful to load all the users then show them one by one
    if(isset($Result)){

        ?>
        <tr style="background-color: rgba(7,71,166,0.62)">

            <th>Order No</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Ordered Date</th>
            <th>Order Status</th>
            <th>Ordered Amount</th>
            <th>Amount Available</th>

            <th>Grant Amount</th>
            <th>Ordered Grant Date</th>

            <th>Approve</th>


        </tr>
        <?php
        while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
            ?>
            <form method="post" action="">
            <tr>
                <td><input type="text" name="order_no" size="5" value="<?php echo $row['order_no']; ?>" readonly></td>
                <td><input type="text" name="p_id" size="5" value="<?php echo $row['p_id']; ?>" readonly></td>
                <td><?php echo $row['pname']; ?></td>

                <td><?php echo $row['o_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['o_amount']; ?></td>
                <td><input type="text" name="c_amount" size="5" value="<?php echo $row['currentamount']; ?>" readonly></td>
                <td><input type="text" name="g_amount" size="5" value="<?php echo $row['g_amount']; ?>" /></td>

            </td>
                <td><?php echo $row['g_date']; ?></td>

                <td>
                    <button type="submit" name="approve" onclick="return confirm('sure to Approve !');">Approve</button>
            </tr>
            </form>
            <?php


        }

    }
    else{

        echo 'Problem in Reading order list'; //giving failure message
    }

    ?>
    </table>

    </div>
</div>

<?php include_once 'template/footer.php'; ?>


</body>
</html>
