<?php

session_start();
include_once 'controller/product.php';
$_Product = new Product();

if(isset($_POST['order'])){
	$connection = mysqli_connect("localhost","root","","hstore");
	$user_id = $_SESSION['user_id'];
	$date = date("Y/m/d");

	$query = "INSERT INTO orders(o_date, user_id) VALUES ('$date',$user_id);";

	$result = mysqli_query($connection, $query);

	if ($result)
	//success
	echo "successful";
  else
	{
	die("Database query not working. " . mysqli_error($connection));
  }
  
  $order_id = mysqli_insert_id($connection);
	foreach($_SESSION['cart'] as $id => $value) {
		$amount = $_SESSION['cart'][$id]['quantity'];
		$query = "INSERT INTO product_order(order_no,p_id, o_amount) VALUES ('$order_id','$id','$amount');";
		$result = mysqli_query($connection, $query);
	}
	$_Product->clearCart();
	header( "url=orderproduct.php" );

}
if(isset($_GET['cart'])){
	if($_GET['cart']=='reset'){
		$_Product->clearCart();
		header( "url=orderproduct.php" );
	}
}
if(isset($_GET['page'])){

	$pages=array("products", "cart");

	if(in_array($_GET['page'], $pages)) {

		$_page=$_GET['page'];

	}else{

		$_page="products";

	}

}else{
	$_GET['cart']='';

	$_page="products";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="resources/css/reset.css" />
	<link rel="stylesheet" href="resources/css/style.css" />
	<link rel="stylesheet" href="resources/css/master.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="resources/js/script.js" charset="utf-8"></script>
    <script src="resources/js/jquery.min.js"></script>


	<title>Order Product</title>

</head>

<body>
	<header>
		<?php include_once 'template/header.php'; ?>
	</header>
	<div id="container">

		<div id="main">

			<?php require($_page.".php"); ?>

		</div><!--end of main-->

		<div id="sidebar">
			<h1>Cart</h1>
			<?php

			if(isset($_SESSION['cart'])){
				$connection = mysqli_connect("localhost","root","","hstore");
				$sql="SELECT products.id as id_product, p_name, p_amount,specs, man_name FROM products
				inner join manufecturer on products.man_id = manufecturer.id WHERE products.id IN (";

				foreach($_SESSION['cart'] as $id => $value) {
					$sql.=$id.",";
				}

				$sql=substr($sql, 0, -1).") ORDER BY p_name ASC";
				$result = mysqli_query($connection, $sql);
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$cart_txt = $row['p_name'].' '.'-> '.$row['man_name'];
					?>
					<p><?php echo $cart_txt ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p>
					<?php

				}
				?>
				<hr />
				<a href="orderproduct.php?page=cart">Go to cart</a> <br>
				<a href="orderproduct.php?cart=reset" class="right">Reset cart</a>
				<?php

			}else{

				echo "<p>Your Cart is empty. Please add some products.</p>";

			}

			?>


		</div><!--end of sidebar-->
		<form class="right" action="" method="post">
			<input type="submit" name="order" value="Order Now">
		</form>

	</div><!--end container-->
</body>
</html>


<?php include_once 'template/footer.php'; ?>
