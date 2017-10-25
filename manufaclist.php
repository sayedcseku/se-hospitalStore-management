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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    /* Remove the navbar's default margin-bottom and rounded borders */
    table {
      border-collapse: collapse;
      width: 100%;
      text-align: center;
  }

  th, td {
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even){background-color: white}
  tr:nth-child(odd){background-color: rgb(190, 190, 190)}

  th {
      background-color: rgb(128, 128, 128);
      color: white;
  }
      /* Remove the navbar's default margin-bottom and rounded borders */

  div {
      background-color: lightblue;
  }

      .navbar {
        margin-top: 0;
        margin-bottom: 0;
        border-radius: 0;
      }
      .jumbotron {
       margin-bottom: 0;
     }
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
      .row.content {height: 450px}

      /* Set gray background color and 100% height */

      /* Set black background color, white text and some padding */


      /* On small screens, set height to 'auto' for sidenav and grid */

        .row.content {height:auto;}
      }
      center {
          text-align: center;
          border: 3px solid grey;
      }



    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: lightblue;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    body{
      background-color: lightgreen;
  		background-image: url(Database/public/img/green.jpg);
  		background-size: cover;
  	}

  </style>
</head>
<body>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Khulna Medical College Store</h1>
      <p>Manufacture List</p>
    </div>
  </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="addmanufac.php"><span class="glyphicon glyphicon-plus"></span> Add Manufacture</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left">
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
        <tr>
          <td>1 </td>
          <td>square </td>


        </tr>
        <tr>
          <td>2 </td>
          <td>Dell </td>

        </tr>
        <tr>
          <td>3 </td>
          <td>Regal </td>
        </tr>
        <tr>
          <td>4 </td>
          <td>Metador </td>
      </tr>
      </table>
    </div>

  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
