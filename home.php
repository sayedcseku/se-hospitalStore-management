<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="resources/css/master.css">
</head>
<body>
    <header>
        <?php include_once 'template/header.php'; ?>
    </header>



    <?php include_once 'template/sidebar.php'; ?>

    <div class="col-sm-8 text-left">
      <h1>Welcome to the Store</h1>
      <hr>
      <h3>This is a official site for Khulna Medical College Store Management</h3>
    </div>
  </div>
</div>

<?php include_once 'template/footer.php'; ?>

</body>
</html>
