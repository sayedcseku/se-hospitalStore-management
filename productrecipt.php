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

		  if(empty($_POST['product_id'])){
			  $data_missing[] = ' Product  ';

		  } else {

			  $p_id= trim($_POST['product_id']);

		  }

		  if(empty($_POST['amount'])){

			  $data_missing[] = ' Amount ';

		  } else{

			  $amount = trim($_POST['amount']);

		  }
		  if(empty($_POST['memo_id'])){

			  $data_missing[] = ' Cash Memo No ';

		  } else{

			  $memo_id = trim($_POST['memo_id']);

		  }


		  if(empty($data_missing)){
			  $connection = mysqli_connect("localhost","root","","hstore");

			  $query = "INSERT INTO product_for_store(p_id, r_id, amount)
			  VALUES ('$p_id','$memo_id','$amount')";


			  $result = mysqli_query($connection, $query);

			  if ($result){
                  $id = mysqli_insert_id($connection);
				  $query = "UPDATE product_for_store set before_amount = (
                      select p_amount from products where id = $p_id
                  ) - '$amount' where id = '$id'";


				 $result = mysqli_query($connection, $query);
				 if ($result){}
				  	echo "successful";

			  }

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
	<title>Product Recieved For Store</title>
	<link rel="stylesheet" href="./resources/css/master.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="resources/js/script.js" charset="utf-8"></script>
    <script src="resources/js/jquery.min.js"></script>

</head>
<header>
    <?php include_once 'template/header.php'; ?>
</header>
<body>
  <div class="container">


				<form name="Recieptform" action="productrecipt.php" method="POST" >

          <div class="center">
					<h1> Product Recipt </h1>
          </div>
					<table class="table table-condensed">
						<tr>
							<td> Product:</td>
							<td>
								<?php
							// this block of code prints the list box of Positions with current assigned  Positions

							$var = '<select name="product_id" class="form-control" multiple>';

								$Result = $_Product->getAllProduct();


							  while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)) {



									$var = $var. '<option value="'.$row['id'].'"';

									$var = $var.'>'.'Product Name: "'.$row['p_name'].'" Specifications: "'.$row['specs'].'" Manufecturer: "'.$row['man_name'].'"</option>';

								}

								$var = $var.'</select>';

							echo $var;
							?>
							</td>
						</tr>

						<tr>
							<td>Amount:</td><td><input type="text" name="amount" placeholder="amount" class="form-control"></td>
						</tr>
						<tr>
							<td>Cash Memo No. :</td><td>
								<?php
							// this block of code prints the list box of Positions with current assigned  Positions

							$var = '<select name="memo_id" class="form-control" multiple>';

								$Result = $_Product->getAllCashMemo();


							  while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)) {



									$var = $var. '<option value="'.$row['id'].'"';

									$var = $var.'>'.$row['cmemo_no'].'</option>';

								}

								$var = $var.'</select>';

							echo $var;
							?>


							</td>
						</tr>
						</div>
					</table>
					<div class="right"  >
							<tr>
								<td></td><td><input type="submit"  name="submit" value="&nbsp;&nbsp;  Submit &nbsp; &nbsp;" class="btn btn-primary btn-block"  ></td>
							</tr>
				</div>

				</form>
				<br>
				<br>
				<div class="modal-footer text-right">
                <a href="recipt.php" >Add Reciept? Add!</a> <br>
				<a href="addproduct.php">Add product? Add!</a> <br>

            </div>


</body>

<?php include_once 'template/footer.php'; ?>
</html>
