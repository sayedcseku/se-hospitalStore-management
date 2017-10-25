<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
if(isset($_POST['submit'])){

	  $data_missing = array();


	  if(empty($_POST['memo_no'])){

		  $data_missing[] = ' Cash Memo No ';

	  } else{

		  $memo_no = trim($_POST['memo_no']);

	  }
	  if(empty($_POST['date'])){

		  $data_missing[] = ' date ';

	  } else{

		  $date = trim($_POST['date']);

	  }
	  if(empty($_POST['source'])){

		  $data_missing[] = ' Brought From ';

	  } else{

		  $source = trim($_POST['source']);

	  }

	  if(empty($data_missing)){
		  $connection = mysqli_connect("localhost","root","","hstore");

		  $query = "INSERT INTO reciepts(cmemo_no, r_date, brought_from) VALUES ('$memo_no','$date','$source');";


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
	<title>Product Reciepts</title>
	<link rel="stylesheet" href="./resources/css/master.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="resources/js/script.js" charset="utf-8"></script>
    <script src="resources/js/jquery.min.js"></script>
</head>

<body>
	<header>
		<?php include_once 'template/header.php'; ?>
	</header>
  <div class="container">



				<form name="regform" action="" method="POST" >

          <div class="center">
					<h1> Product Recipt </h1>
          </div>
					<table class="table table-condensed">

						<tr>
							<td>Cash Memo No. :</td><td><input type="text" name="memo_no" placeholder="Memo No." class="form-control"></td>
						</tr>
						<tr>
							<td>Date :</td><td><input type="date" name="date" placeholder="date" class="form-control"></td>
						</tr>


							<tr>
								<td>Brought From :</td><td><input type="text" name="source" placeholder="Brought From" class="form-control"></td>
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
				<a href="addproduct.php">Add product? Add!</a> <br>
				</div>


</body>
</html>
