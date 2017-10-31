<?php


class Product
{

    function __construct()
    {

    }
    public function getAllOrder()
    {
        $sql = "SELECT
        `order_no`,
        p_id,
        products.p_name as pname,
        `o_amount`,
        `o_date`,
        `status`,
        products.p_amount as currentamount,

        users.fname ,
        users.lname,
        `g_date`,
        `g_amount`,
        `after_amount`
        FROM
        `product_order`
        INNER JOIN
        orders
        ON
        product_order.order_no = orders.id
        INNER JOIN products ON products.id = product_order.p_id
        INNER JOIN users ON orders.user_id = users.id;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error($connection));
        }
    }
    public function approveOrder($order_id, $product_id,$g_amount,$c_amount)
    {
        $sql = "update orders set status = 'approved',g_date = current_date(),g_amount = $g_amount
        where id = $order_id";
        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);
        if ($result)
        echo "ok0";
        else
        {
            die("Database update orders query not working. " . mysqli_error($connection));
        }
        $sql = "update products set p_amount = p_amount - $g_amount where
        products.id = $product_id" ;
        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);
        if ($result)
            echo "ok1";
        else
        {
            die("Database update product query not working. " . mysqli_error($connection));
        }
        $sql = "update orders set after_amount = $c_amount - $g_amount where
        orders.id = $order_id" ;
        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);
        if ($result)
        echo "ok2";
        else
        {
            die("Database update after amount orders query not working. " . mysqli_error($connection));
        }
    }
    public function clearCart()
    {
        unset($_SESSION['cart']);
        //header( "url=/orderproduct.php" );
    }
    public function getRecievedProductInLedger($id){
        $sql = "SELECT
        reciepts.r_date AS DATE,
        product_for_store.before_amount AS b_amount,
        product_for_store.amount AS recieved,
        (
            product_for_store.before_amount + product_for_store.amount
        ) AS a_amount
        FROM
        product_for_store
        INNER JOIN
        products
        ON
        product_for_store.p_id = products.id
        INNER JOIN
        reciepts
        ON
        reciepts.id = product_for_store.r_id
        WHERE
        product_for_store.p_id = 1
        ORDER BY
        DATE ASC;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);

        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error($connection));
        }
    }
    public function getProvidedProductInLedger($id){
        $sql = "SELECT
        orders.g_date AS DATE,
        (users.fname + ' ' + users.lname) AS u_name,
        orders.g_amount AS given,
        orders.after_amount AS a_amount
        FROM
        product_order
        INNER JOIN
        products
        ON
        product_order.p_id = products.id
        INNER JOIN
        orders
        ON
        product_order.order_no = orders.id
        INNER JOIN
        users
        ON
        users.id = orders.user_id
        WHERE
        product_order.p_id = 1
        ORDER BY
        DATE ASC";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);

        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error($connection));
        }
    }

    public function selectLedger($id){
        $sql = "SELECT * FROM `products` where ptype_id = $id;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error($connection));
        }
    }
    public function getAllLedger(){
        $sql = "SELECT * FROM `product_type`;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error($connection));
        }
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
    public function getProduct($id)
    {
        $sql = "SELECT products.id,p_name,p_amount,specs,man_name,type_name FROM products inner join
        manufecturer on products.man_id = manufecturer.id inner join
        product_type on products.ptype_id = product_type.id where products.id = $id";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
        return $result;
        else
        {
            die("Database query not working. " . mysqli_error());
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
