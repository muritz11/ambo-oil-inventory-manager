<?php

function dispTable($table, $name){
    global $conn;
    $sql = "SELECT * FROM $table";
    $users = $conn->query($sql);

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $id = $row['id'];
            $prodname = $row['product_name'];
            $uom = $row['UOM'];
            $supp = $row[$name];
            $amt = $row['amount'];
            $qty = $row['quantity'];
            $date = date_create($row['date']);
            $date = date_format($date, "d/m/Y");

            $table = "<tr>
                        <td> $id </td>
                        <td> $prodname </td>
                        <td> $uom </td>
                        <td> $supp </td>
                        <td> $amt </td>
                        <td> $qty </td>
                        <td> $date </td>
                      </tr>";
            echo $table;
        }
    } else {
        echo "0 results";
    }
}

function outstanding(){
    global $conn;
    $sql = "SELECT * FROM outstanding_products";
    $users = $conn->query($sql);

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $id = $row['id'];
            $prodname = $row['product_name'];
            $uom = $row['UOM'];
            $supp = $row['supplier'];
            $amt = $row['amount'];
            $qty = $row['quantity'];
            $date = date_create($row['date']);
            $date = date_format($date, "d/m/Y");

            $table = "<tr>
                        <td> $id </td>
                        <td> $prodname </td>
                        <td> $uom </td>
                        <td> $supp </td>
                        <td> $amt</td>
                        <td> $qty </td>
                        <td> $date 
                            <a href='outstanding.php?edit=1&id=$id'><i class='fa fa-edit' id='edit' title='update'></i></a> 
                            <a href='outstanding.php?del=1&id=$id'><i class='fa fa-trash-o' id='delete' title='delete'></i></a>
                        </td>
                      </tr>";
            echo $table;
        }
    } else {
        echo "0 results";
    }
}



function inventory(){
    global $conn;
    $sql = "SELECT * FROM inventory";
    $users = $conn->query($sql);

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $id = $row['id'];
            $prodname = $row['product_name'];
            $uom = $row['UOM'];
            $supp = $row['supplied'];
            $received = $row['received'];
            $phy = $row['physical_stock'];
            $qty = $row['opening_stock'];
            $date = date_create($row['date']);
            $date = date_format($date, "d/m/Y");
//                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . "<button class=\"btn btn-danger btn-sm\" name=\"del\">Delete</button>" . "</td>";
            $table = "<tr>
                        <td> $id </td>
                        <td> $prodname </td>
                        <td> $uom </td>
                        <td> $qty </td>
                        <td> $received </td>
                        <td> $supp </td>
                        <td> $phy</td>
                        <td> $date </td>
                      </tr>";
            echo $table;
        }
    } else {
        echo "0 results";
    }
}



function products_table(){
    if ( $xlsx = SimpleXLSX::parse('../assets/ambo_products.xlsx') ) {
        foreach( $xlsx->rows() as $r ) {
            echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
        }
        // or $xlsx->toHTML();
    } else {
        echo SimpleXLSX::parseError();
    }
}


function inventory_list(){
    global $conn;
    $sql = "SELECT * FROM inventory_list";
    $users = $conn->query($sql);

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $id = $row['id'];
            $prodname = $row['product'];
            $uom = $row['pack_size'];
            $low = $row['low_point'];
            $phy = $row['physical_stock'];

            if ($phy <= $low){

                if ($phy!=''){

                    $nphy = $phy."<i class='fa fa-warning' style='color: red'></i>";

                } else {

                    $nphy = $phy;

                }

            } else {

                $nphy = $phy;

            }
//                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . "<button class=\"btn btn-danger btn-sm\" name=\"del\">Delete</button>" . "</td>";
            $table = "<tr>
                        <td> $id </td>
                        <td> $prodname </td>
                        <td> $uom </td>
                        <td class='low'>$low <a href='inventory.php?edit=1&id=$id'> <i class='fa fa-edit' title='edit'></i> </a></td>
                        <td class='o-stock'> $nphy </td>
                      </tr>";
            echo $table;
        }
    } else {
        echo "0 results";
    }
}



function monthly($year, $month){

    global $conn;
    $sql = "SELECT * FROM inventory WHERE date LIKE '%$year-$month%'";
    $users = $conn->query($sql);

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $id = $row['id'];
            $prodname = $row['product_name'];
            $uom = $row['UOM'];
            $supp = $row['supplied'];
            $received = $row['received'];
            $phy = $row['physical_stock'];
            $qty = $row['opening_stock'];
            $date = date_create($row['date']);
            $date = date_format($date, "d/m/Y");
//                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . "<button class=\"btn btn-danger btn-sm\" name=\"del\">Delete</button>" . "</td>";
            $table = "<tr>
                        <td> $id </td>
                        <td> $prodname </td>
                        <td> $uom </td>
                        <td> $qty </td>
                        <td> $received </td>
                        <td> $supp </td>
                        <td> $phy</td>
                        <td> $date </td>
                      </tr>";
            echo $table;
        }
    } else {
        echo "0 results";
    }
}

function low_stock(){
    global $conn;

    $sql = "SELECT * FROM `inventory_list` WHERE low_point >= physical_stock AND physical_stock!=''";
    $data = $conn->query($sql);

    if ($data->num_rows > 0) {

        echo '<b>'.$data->num_rows.'</b><br><span style="margin: 0"> Low stock(s)</span>';

    } else {
        echo 'No <br>low stock(s)';
    }
}

function avail_prod(){

    global $conn;

    $sql = "SELECT * FROM `inventory_list` WHERE physical_stock!=''";
    $data = $conn->query($sql);

    if ($data->num_rows > 0) {

        echo '<b>'.$data->num_rows.'</b><br><span style="margin: 0"> Products are available</span>';

    } else {
        echo 'No <br>product available';
    }

}

function outs_prod(){

    global $conn;

    $sql = "SELECT * FROM `outstanding_products`";
    $data = $conn->query($sql);

    if ($data->num_rows > 0) {

        echo '<b>'.$data->num_rows.'</b><br><span style="margin: 0">Outstanding products</span>';

    } else {
        echo 'No <br>outstanding products';
    }

}

function supp_prod(){

    global $conn;

    $sql = "SELECT * FROM supplied_stock";
    $data = $conn->query($sql);

    if ($data->num_rows > 0) {

        echo '<b>'.$data->num_rows.'</b><br><span style="margin: 0">Stock supplied</span>';

    } else {
        echo '0 <br>Stock supplied';
    }

}

function two_dec($num){
    for ($x = 1; $x < 10; $x++){

        if ($num == $x){

            $num = 0 . $num;
            return $num;

        } elseif ($num > 9){
            return $num;
        }

    }
}