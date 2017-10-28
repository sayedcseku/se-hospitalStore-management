<?php
include_once 'controller/product.php';
session_start();
$_Product = new Product();
$ledger_id = '';
$product_name = '';
$product_specs = '';
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
if(isset($_GET['select']))
{
	$ledger_id = $_GET['select'];
	$Ledger = $_Product->selectLedger($ledger_id); //reading the user object from the result object
}


if(isset($_GET['product']))
{
	$product_id = $_GET['product'];
    $Result = $_Product->getProduct($product_id);
    $row=mysqli_fetch_array($Result,MYSQLI_ASSOC);
    //print_r($row);
    $product_name = $row['p_name'];;
    $product_specs = $row['specs'];
	$incoming = $_Product->getRecievedProductInLedger($product_id);
    $outgoing = $_Product->getProvidedProductInLedger($product_id);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ledger</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="resources/js/script.js" charset="utf-8"></script>
    <script src="resources/js/jquery.min.js"></script>
	<link rel="stylesheet" href="resources/css/master.css">

</head>

<body>
	<header>
		<?php include_once 'template/header.php'; ?>
	</header>
    <div class="panel panel-body">

    <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">
    <?php


    $Result = $_Product->getAllLedger();

    //if DAO access is successful to load all the users then show them one by one
    if(isset($Result)){

        ?>
        <tr style="background-color: rgba(7,71,166,0.62)">

            <th>Product id</th>
            <th>Product Name</th>
            <th>Select</th>

        </tr>
        <?php
        while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['type_name']; ?></td>
                <td>
                <a href="?select=<?php echo $row['id']; ?>" onclick="return confirm('sure to Select !'); " >Select</a>
                </td>

            </tr>
            <?php

        }

    }
    else{

        echo 'Problem in Reading Ledger list'; //giving failure message
    }

    ?>
    </table>
    </div>

<div class="panel panel-body">
    <?php
    if(isset($_GET['select']))
    {
        ?>
        <div class="panel-heading text-center" style="background-color: rgba(7,71,166,0.62)">
            <b> Ledger</b></div>
        <br>
        <?php
     ?>
    <br>
    <?php

        $var1= ' <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">';


            $var1.=   '  <tr style="background-color: rgba(7,71,166,0.62)">';

                $var1.= '    <th>Product Name</th>';
                $var1.=     ' <th>Specifications</th>';
                $var1.=   '  <th>Select</th>';

                $var1.= ' </tr>';

                echo $var1;


                while($row=mysqli_fetch_array($Ledger,MYSQLI_ASSOC)){

                    ?>
                    <tr>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><?php echo $row['specs']; ?></td>
                        <td>
                        <a href="?select=<?php echo $ledger_id;?>&product=<?php echo $row['id'] ?>" onclick="return confirm('sure to Select !'); " >Select</a>
                        </td>

                    </tr>
    <?php
                }




        $var1=' </table>';
    $var1.= ' </div>';
    echo $var1;
}
     ?>

    <br>


    </div>
</div>
<div class="panel panel-body">
    <?php
    if(isset($_GET['product']))
    {
        ?>
        <div class="panel-heading text-center" style="background-color: rgba(7,71,166,0.62)">
            <b>Recieved Product</b></div>
        <br>

        <p>Product ID: <?php echo $product_id; ?></p>
        <br>
        <p>Product Name:  <?php  echo $product_name; ?></p>
        <br>
        <p>Product Specifications:  <?php  echo $product_specs; ?></p>
        <?php
     ?>
    <br>
    <?php

        $var1= ' <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">';


            $var1.=   '  <tr style="background-color: rgba(7,71,166,0.62)">';

                $var1.= '    <th>Date</th>';
                $var1.=     ' <th>Quantity Before</th>';
                $var1.=   '  <th>Recieved</th>';
                //$var1.= '    <th>Ordered By</th>';
                //$var1.=     ' <th>Given Quantity</th>';
                $var1.=   '  <th>Quantity After</th>';
                $var1.=   '  <th>Remark</th>';

                $var1.= ' </tr>';

                echo $var1;

                while($row=mysqli_fetch_array($incoming,MYSQLI_ASSOC)){

                    ?>
                    <tr>
                        <td><?php echo $row['DATE']; ?></td>
                        <td><?php echo $row['b_amount']; ?></td>
                        <td><?php echo $row['recieved']; ?></td>
                        <td><?php echo $row['a_amount']; ?></td>
                        <td><?php echo 'Null for now'; ?></td>

                    </tr>
    <?php
                }




        $var1=' </table>';
    $var1.= ' </div>';
    echo $var1;
}
     ?>

    <br>


    </div>
</div>
<div class="panel panel-body">
    <?php
    if(isset($_GET['product']))
    {
        ?>
        <div class="panel-heading text-center" style="background-color: rgba(7,71,166,0.62)">
            <b>Recieved Product</b></div>
        <br>

        <p>Product ID: <?php echo $product_id; ?></p>
        <br>
        <p>Product Name:  <?php  echo $product_name; ?></p>
        <br>
        <p>Product Specifications:  <?php  echo $product_specs; ?></p>
        <?php
     ?>
    <br>
    <?php

        $var1= ' <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">';


            $var1.=   '  <tr style="background-color: rgba(7,71,166,0.62)">';

                $var1.= '    <th>Date</th>';
                $var1.=     ' <th>Quantity Before</th>';
                $var1.= '    <th>Ordered By</th>';
                $var1.=     ' <th>Given Quantity</th>';
                $var1.=   '  <th>Quantity After</th>';
                $var1.=   '  <th>Remark</th>';

                $var1.= ' </tr>';

                echo $var1;

                while($row=mysqli_fetch_array($outgoing,MYSQLI_ASSOC)){

                    ?>
                    <tr>
                        <td><?php echo $row['DATE']; ?></td>
                        <td><?php echo $row['u_name']; ?></td>
                        <td><?php echo $row['given']; ?></td>
                        <td><?php echo $row['a_amount']; ?></td>
                        <td><?php echo 'Null for now'; ?></td>

                    </tr>
    <?php
                }




        $var1=' </table>';
    $var1.= ' </div>';
    echo $var1;
}
     ?>

    <br>


    </div>
</div>

	<?php include_once 'template/footer.php'; ?>
</body>

</html>
