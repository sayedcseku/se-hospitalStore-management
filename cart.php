<?php
$connection = mysqli_connect("localhost","root","","hstore");
	if(isset($_POST['submit'])){

		foreach($_POST['quantity'] as $key => $val) {
			if($val==0) {
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}

	}

?>

<h1>View cart</h1>
<a href="orderproduct.php?page=products">Go back to the products page.</a>
<form method="post" action="orderproduct.php?page=cart">

	<table>

		<tr>
		    <th>Name</th>
		    <th>Quantity</th>
		    <th>Specs</th>
		</tr>

		<?php

        $sql="SELECT products.id as id_product, p_name, p_amount,specs, man_name FROM products
        inner join manufecturer on products.man_id = manufecturer.id WHERE products.id IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY p_name ASC";
                    $result = mysqli_query($connection, $sql);
    				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

					?>
						<tr>
						    <td><?php echo $row['p_name'] ?></td>
						    <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td>
						    <td><?php echo $row['specs'] ?>$</td>
						</tr>
					<?php

					}
		?>
				

	</table>
	<br />
	<button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item set its quantity to 0. </p>
