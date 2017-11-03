<?php
session_start();

if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>
<?php
	include_once 'controller/product.php';

	$_Product = new Product();
	if(isset($_POST['submit'])){

		  $data_missing = array();

		  if(empty($_POST['productName'])){
			  $data_missing[] = ' Product Name ';

		  } else {

			  $p_name = trim($_POST['productName']);

		  }

		  if(empty($_POST['amount'])){

			  $data_missing[] = ' Amount ';

		  } else{

			  $amount = trim($_POST['amount']);

		  }
		  if(empty($_POST['specs'])){

			  $data_missing[] = ' Specifications ';

		  } else{

			  $specs = trim($_POST['specs']);

		  }
		  if(empty($_POST['man_id'])){

			  $data_missing[] = ' manufecturer ';

		  } else{

			  $man_id = trim($_POST['man_id']);

		  }
		  if(empty($_POST['type_id'])){

			  $data_missing[] = ' Product Type ';

		  } else{

			  $type_id = trim($_POST['type_id']);

		  }


		  if(empty($data_missing)){
			  $connection = mysqli_connect("localhost","root","","hstore");

			  $query = "INSERT INTO products(p_name, p_amount, specs, man_id, ptype_id)
			  VALUES ('$p_name','$amount','$specs','$man_id','$type_id')";


			  $result = mysqli_query($connection, $query);

			  print_r($result);

			  //test if there was a query error
			  if ($result)
				//success
				echo "successful";
			  else
				{
				die("Database query not working. " . mysqli_error($connection));
			  }

			  $id = mysqli_insert_id($connection);


		  } else {

			  echo 'You need to enter the following data<br />';

			  foreach($data_missing as $missing){

				  echo "$missing<br />";

			  }

		  }

	  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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
  <div class="container">



				<form name="regform" action="addproduct.php" method="POST" onsubmit="return validateForm()">
          <div class="center">
					<h1>Add Product </h1>
          </div>
					<table class="table table-condensed">

						<tr>
							<td>Product Name :</td><td><input type="text" name="productName" placeholder="Productname" class="form-control"></td>
						</tr>
						<tr>
							<td>Product Amount :</td><td><input type="text" name="amount" placeholder="Product Amount" class="form-control"></td>
						</tr>
						<tr>
							<td>Specification :</td><td><input type="blog_descrip" name="specs" placeholder="Specification" class="form-control"></td>
						</tr>
						<div class="mainselection">
						<tr>
							<td> Manufacture:</td><td>
								<?php
						    // this block of code prints the list box of Positions with current assigned  Positions

						    $var = '<select name="man_id" class="form-control" multiple>';

								$Result = $_Product->getAllManufacturer();


						      while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)) {



						    		$var = $var. '<option value="'.$row['id'].'"';

						          	$var = $var.'>'.$row['man_name'].'</option>';

								}

								$var = $var.'</select>';

							echo $var;
							?>
						</td>
						</tr>
						<tr>
							<td> Product Type:</td><td><?php

						$var = '<select name="type_id" class="form-control" multiple>';

							$Result = $_Product->getAllProductType();


						  while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)) {



								$var = $var. '<option value="'.$row['id'].'"';

								$var = $var.'>'.$row['type_name'].'</option>';

							}

							$var = $var.'</select>';

						echo $var;
						?></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit" value="Add Product" class="btn btn-primary btn-block"  ></td>
						</tr>
					</table>

				</form>

</div>




	<?php include_once 'template/footer.php'; ?>
</body>


}
