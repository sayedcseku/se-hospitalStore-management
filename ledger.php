<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  table {
    border-collapse: collapse;
    width: 100%;
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list"></span> Ledgers<span class="caret"></span></a>
          <ul class="dropdown-menu">
      <li><a href="#">Stationary and Others</a></li>
      <li><a href="#">Computers and Equepments</a></li>
      <li><a href="#">Furniture</a></li>
      <li><a href="#">Electrical</a></li>
      <li><a href="#">Sports</a></li>
      <li><a href="#">Chemicals and Reagents</a></li>
      <li><a href="#">Intruments</a></li>
    </ul>
        <!--<ul class="dropdown-menu">-->
        </ul>
        <ul class="nav navbar-nav navbar-right">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-plus"></span>Add Ledger</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-8 text-left">
      <h2>   </h2>
<table>
  <tr>
    <th>Date</th>
    <th>Before Fund</th>
    <th>Receipts</th>
    <th>C.Memo Challan No.</th>
    <th>Total</th>
    <th>Quantity Sold</th>
    <th>Balance</th>
    <th>Remarks</th>
  </tr>
  <tr>
    <td>16/08/17 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>

  </tr>
  <tr>
    <td>17/08/17 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
  </tr>
  <tr>
    <td>18/08/17 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
  </tr>
  <tr>
    <td>19/08/17 </td>
    <td>nothing </td>
    <td>nothing</td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
    <td>nothing </td>
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
