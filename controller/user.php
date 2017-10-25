<?php



class User
{

    function __construct()
    {

    }
    function getAllRole()
    {
        $sql = "SELECT `id`, `r_name`, `r_desc` FROM `roles`;";

        $result = mysqli_query(mysqli_connect("localhost","root","","hstore"), $sql);


        //test if there was a query error
        if ($result)
          return $result;
        else
          {
          die("Database query not working. " . mysqli_error($connection));
        }

        //$id = mysqli_insert_id($connection);


    }

}




 ?>
