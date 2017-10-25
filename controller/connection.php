<?php

class DB{
    public function __construct()
    {
    }
    public $conn = '';
    public function connection()
    {
        $connection = mysqli_connect("localhost","root","","hstore");

        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          return $conn;
    }
}


 ?>
