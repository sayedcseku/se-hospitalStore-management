
<div class="panel panel-body">

<table class="table table-bordered table-striped" style="border: 1px solid;border-color: rgba(7,71,166,0.62)">
<?php


$Result = $_Product->getAllProduct();

//if DAO access is successful to load all the users then show them one by one
if(isset($Result)){

    ?>
    <tr style="background-color: rgba(7,71,166,0.62)">
        <th>Product Name</th>
        <th>Specifications</th>
        <th>Amount</th>
        <th>Manufecturer</th>
        <th>Ledger</th>

        <th style="color: darkred">Delete</th>
    </tr>
    <?php
    while($row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?php echo $row['p_name']; ?></td>
            <td><?php echo $row['specs']; ?></td>
            <td><?php echo $row['p_amount']; ?></td>
            <td><?php echo $row['man_name']; ?></td>
            <td><?php echo $row['type_name']; ?></td>
            <td>
                <a class="text-danger" href="?del=<?php echo $row['id'];  ?>" onclick="return confirm('sure to delete !'); " >delete</a>
            </td>
        </tr>
        <?php

    }

}
else{

    echo 'Problem in Reading product list'; //giving failure message
}

?>
</table>
</div>
