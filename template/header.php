<?php
    $connection = mysqli_connect("localhost","root","","hstore");
 ?>

<div class="jumbotron">
    <div class="text-center">
        <h1>Khulna Medical College Store</h1>
        <p>Store Management</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
    </script>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Khulna Medical College</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home <span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Ledger Management
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="addledger.php">Add Ledger</a></li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">Ledger List <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        $sql = "SELECT * FROM `product_type` ";
                                        $result = mysqli_query($connection, $sql);
                                        if(isset($result)){
                                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

                                            ?>
                                            <li><a tabindex="-1" href="#"><?php echo $row['type_name'] ?></a></li>
                                            <?php
                                        }
                                    }
                                     ?>
                                </ul>
                            </li>
                        </ul>
                    </li>


                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav navbar-nav navbar-right"><a href="#"><span class="glyphicon"></span> <?php echo $_SESSION['fullname'] ?> </a></li>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(!$_SESSION['email'])
                        {
                            ?>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php
                        }
                        else {
                            ?>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>

        </nav>
