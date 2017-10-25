<?php
session_start();

?>
<?php

 include_once 'controller/connection.php';
 include_once 'controller/user.php';

	$_User = new User();

if(isset($_POST['submit'])){

	  $data_missing = array();

	  if(empty($_POST['F_Name'])){
		  $data_missing[] = ' First Name ';

	  } else {

		  $f_name = trim($_POST['F_Name']);

	  }

	  if(empty($_POST['L_Name'])){

		  $data_missing[] = ' Last Name ';

	  } else{

		  $l_name = trim($_POST['L_Name']);

	  }
	  if(empty($_POST['Username'])){

		  $data_missing[] = ' Username ';

	  } else{

		  $username = trim($_POST['Username']);

	  }
	  if(empty($_POST['Email'])){

		  $data_missing[] = ' Email ';

	  } else{

		  $email = trim($_POST['Email']);

	  }
	  if(empty($_POST['Password'])){

		  $data_missing[] = ' Password ';

	  } else{

		  $password = trim($_POST['Password']);

	  }
	  if(empty($_POST['address'])){

		  $data_missing[] = ' address ';

	  } else{

		  $address = trim($_POST['address']);

	  }
	  if(empty($_POST['role_id'])){

		  $data_missing[] = ' Role ';

	  } else{

		  $role_id = trim($_POST['role_id']);

	  }

	  if(empty($data_missing)){
		  $connection = mysqli_connect("localhost","root","","hstore");

		  $query = "INSERT INTO users(fname, lname, address, email, username,
			  password, role_id) VALUES ('$f_name','$l_name','$address','$email','$username','$password','$role_id')";


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
	<title>Registration</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="resources/js/jquery.min.js"></script>
    <link rel="stylesheet" href="resources/css/master.css">

</head>


<body>
	<header>
        <?php include_once 'template/header.php'; ?>
    </header>

  <div class="container">


				<form name="regform" action="" method="POST" >

					<h3>Registration </h3>
					<table class="table table-condensed">
						<tr>
							<td>First Name :</td><td><input type="text" name="F_Name" placeholder="First Name" class="form-control"></td>
						</tr>
						<tr>
							<tr>
								<td>Last Name:</td><td><input type="text" name="L_Name" placeholder="Last Name" class="form-control"></td>
							</tr>
							<td>Username :</td><td><input type="text" name="Username" placeholder="Username" class="form-control"></td>
						</tr>
						<tr>
							<td>Email :</td><td><input type="email" name="Email" placeholder="Email" class="form-control"></td>
						</tr>

						<tr>
							<td>Password :</td><td><input type="password" name="Password" placeholder="Password" class="form-control"></td>
						</tr>
						<tr>
							<td>Address. :</td><td><input type="text" name="address" placeholder="Address" class="form-control"></td>
						</tr>
						<tr>
							<td>Role. :</td><td><?php
						    // this block of code prints the list box of Positions with current assigned  Positions

						    $var = '<select name="role_id" class="form-control" multiple>';

								$Result = $_User->getAllRole();


						      while($Role=mysqli_fetch_array($Result,MYSQLI_ASSOC)) {



						    		$var = $var. '<option value="'.$Role['id'].'"';

						          	$var = $var.'>'.$Role['r_name'].'</option>';

								}

								$var = $var.'</select>';

							echo $var;
							?>
						</td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block"  ></td>
						</tr>
					</table>

				</form>
				<div class="modal-footer text-right">
				<a href="login.php">Already have account? Login!</a> <br>
				</div>

				<?php include_once 'template/footer.php'; ?>


</div>
</body>
