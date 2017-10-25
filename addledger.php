<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
if(isset($_POST['submit'])){

	  $data_missing = array();


	  if(empty($_POST['ledger_name'])){

		  $data_missing[] = ' Ledger Name ';

	  } else{

		  $ledger_name = trim($_POST['ledger_name']);

	  }

	  if(empty($data_missing)){
		  $connection = mysqli_connect("localhost","root","","hstore");

		  $query = "INSERT INTO product_type(type_name) VALUES ('$ledger_name');";


		  $result = mysqli_query($connection, $query);

		  if ($result)
  		  //success
  		  echo "successful";
  		else
  		  {
  		  die("Database query not working. " . mysqli_error($connection));
  		}

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
	<title>Ledger Management</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="resources/js/script.js" charset="utf-8"></script>
    <script src="resources/js/jquery.min.js"></script>
	<link rel="stylesheet" href="./resources/css/master.css">
</head>

<body>
	<header>
		<?php include_once 'template/header.php'; ?>
	</header>
	<div class="container">



		<form name="regform" action="" method="POST">

			<div class="center">
				<h1> Add Ledger </h1>
			</div>
			<table class="table table-condensed">
				<tr>
					<td>Name :</td><td><input type="text" name="ledger_name" placeholder="Ledger Name" class="form-control"></td>
				</tr>
				<div class="right"  >
					<tr>
						<td></td><td><input type="submit"  name="submit" value="&nbsp;&nbsp;  Submit &nbsp; &nbsp;" class="btn btn-primary btn-block"  ></td>
					</tr>
				</div>
			</div>
		</table>

	</form>


</body>
</head>
</html>
