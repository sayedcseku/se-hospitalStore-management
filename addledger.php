<?php
include_once 'controller/product.php';
session_start();
$_Product = new Product();
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
	<div class="smallcontainer">



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

		</table>

	</form>
</div>
    <div class="panel panel-body">

    <table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">
    <?php


    $Result = $_Product->getAllLedger();

    //if DAO access is successful to load all the users then show them one by one
    if(isset($Result)){

        ?>
        <tr style="background-color: rgba(7,71,166,0.62)">
            <th>Ledger Id</th>
            <th>Ledger Name</th>
            <th>Edit</th>

            <th style="color: darkred">Delete</th>
        </tr>
        <?php
        while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['type_name']; ?></td>

                <td>
                    <a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to edit !'); " >Edit</a>
                </td>
                <td>
                    <a class="text-danger" href="?del=<?php echo $row['id'];  ?>" onclick="return confirm('sure to delete !'); " >delete</a>
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



</body>
</head>
</html>
