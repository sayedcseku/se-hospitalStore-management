<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

if(isset($_POST['submit'])){

	  $data_missing = array();


	  if(empty($_POST['role_name'])){

		  $data_missing[] = ' Role Name ';

	  } else{

		  $role_name = trim($_POST['role_name']);

	  }
	  if(empty($_POST['role_desc'])){

		  $data_missing[] = ' Role Description ';

	  } else{

		  $role_desc = trim($_POST['role_desc']);

	  }

	  if(empty($data_missing)){
		  $connection = mysqli_connect("localhost","root","","hstore");

		  $query = "INSERT INTO `roles`(`r_name`, `r_desc`) VALUES ('$role_name','$role_desc');";


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
	<title>Role Management</title>
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



				<form name="regform" action="addrole.php" method="POST" onsubmit="return validateForm()">
          <div class="center">
					<h1>Add Role </h1>
          </div>
					<table class="table table-condensed">

						<tr>
							<td>Roll Name :</td><td><input type="text" name="role_name" placeholder="Rollname" class="form-control"></td>
						</tr>
						<tr>
							<td>Roll Description :</td><td><input type="blog_descrip" name="role_desc" placeholder="Roll Description" class="form-control"></td>
						</tr>
					</table>

					<div class="right"  >
							<tr>
								<td></td><td><input type="submit"  name="submit" value="&nbsp;&nbsp;  Submit &nbsp; &nbsp;" class="btn btn-primary btn-block"  ></td>
							</tr>
				</div>

				</form>

</div>
</body>
<?php include_once 'template/footer.php'; ?>
</head>
