<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    background-color: lightblue;
		background-size: cover;
	}
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
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
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
    .center {
        margin: auto;
        width: 50%;
        padding: 20px;
    }
  </style>

</head>
<body>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Khulna Medical College Store</h1>
      <p>Store ledger</p>
    </div>
  </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
    </ul>
        <!--<ul class="dropdown-menu">-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-edit"></span>Update Product</a></li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="addproduct.php"><span class="glyphicon glyphicon-plus"></span>Add Product</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="center">

  <div class="row content">
    <div class="col-sm-8 text-left">
      <h2>   </h2>
<table>
  <tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Specification</th>
    <th>Amount</th>
    <th>Product Type</th>
    <th>Manufactur</th>
  </tr>
  <tr>
    <td>1 </td>
    <td>Fujitsu Laptop </td>
    <td>intelCorei7</td>
    <td>2 </td>
    <td>Computer</td>
    <td>Intel </td>

  </tr>
  <tr>
    <td>2 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
  </tr>
  <tr>
    <td>3 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
  </tr>
  <tr>
    <td>4 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>

</tr>
</table>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>KMC</p>
</footer>

</body>
</html>
