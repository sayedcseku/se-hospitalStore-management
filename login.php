<?php

session_start();//session starts here
$_SESSION['email']='';
$_SESSION['fullname']='';
$_SESSION['username']='';

$fullname='';
if(isset($_POST['submit'])){

	  $data_missing = array();


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

	  if(empty($data_missing)){
		  $connection = mysqli_connect("localhost","root","","hstore");

		  $query = "SELECT id, username,fname,lname from users where email = '$email' and password = '$password';";


		  $result = mysqli_query($connection, $query);

		  $rows=mysqli_fetch_array($result,MYSQLI_ASSOC);

		  $fullname = $rows['fname']. ' '.$rows['lname'];


		  //test if there was a query error
		  if (strlen($fullname)>5){
              $_SESSION['email']=$email;
			  $_SESSION['username']=$rows['username'];
			  $_SESSION['user_id']=$rows['id'];
			  $_SESSION['fullname']=$fullname;
			  echo "login successful";
			  //print_r($_SESSION);
			  header( "refresh:.5;url=home.php" );
		  }
			//success

		  else
			{
			die('Wrong Email or Password. Try Again!');
			header( "refresh:1;url=login.php" );
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
	<title>Login</title>
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
 <div class="aa">

	<form name="loginform" action="" method="POST" onsubmit="return validateForm()">
	<h3>Login </h3>
	<input type="email" name="Email" placeholder="Email" class="form-control"><br><br>
	<input type="password" name="Password" placeholder="Password" class="form-control"><br><br>
	<div class="text-left">  <input type="checkbox" checked="checked">   Keep me logged in </div>
	<input type="submit" name="submit" value=" Login " class="btn btn-primary btn-block"  > <br><br>

	</form>
	<div class="modal-footer text-right">
	<a href="registration.php">No account here? Signup now !</a> <br>
	</div>


</div>
	<?php include_once 'template/footer.php'; ?>
</body>
</head>
