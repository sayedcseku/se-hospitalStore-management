<?php


class Product
{

    function __construct()
    {

    }
    public function clearCart()
    {
        unset($_SESSION['cart']);
        //header( "url=/orderproduct.php" );
    }
    public function getAllManufacturer()
    {
        $sql = "SELECT `id`, `man_name` FROM `manufecturer`;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
          return $result;
        else
          {
          die("Database query not working. " . mysqli_error($connection));
        }
    }
    public function getAllProductType()
    {
        $sql = "SELECT `id`, `type_name` FROM `product_type`;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
          return $result;
        else
          {
          die("Database query not working. " . mysqli_error($connection));
        }
    }
    public function getAllProduct()
    {
        $sql = "SELECT products.id,p_name,p_amount,specs,man_name,type_name FROM products inner join
        manufecturer on products.man_id = manufecturer.id inner join
        product_type on products.ptype_id = product_type.id;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
          return $result;
        else
          {
          die("Database query not working. " );
        }
    }
    public function getAllCashMemo()
    {
        $sql = "SELECT id,cmemo_no FROM reciepts;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
          return $result;
        else
          {
          die("Database query not working. " );
        }
    }
}


 ?>
