<?php
session_start();
include_once 'conn.php';

//reg form validation
if(isset($_POST['save'])){

    foreach ($_POST as $k => $v) {
        $_POST[$k] = test_inputs($v);
    }

    extract($_POST);
    $errMsg = '';
    $msg = '';

    $check = "SELECT * FROM users WHERE username LIKE '$username' or firstName LIKE '$firstname' or lastName LIKE '$lastname'";
    $data = $conn->query($check);
    $row = $data->fetch_assoc();

    //when form is submitted do the back end validation: check if email is valid, check if username already exist and hash pword
    //also remember to automatically capitalize the name before sending to db
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $errMsg = 'Sorry, invalid email format';
        createSession('errmsg', $errMsg);

        createSession('username', $username);
        createSession('email', $email);
        createSession('firstname', $firstname);
        createSession('lastname', $lastname);

        header("location:../../register.php");

    } elseif ($row['username'] == $username) {

        $errMsg = "Sorry, Username already exist";
        createSession('errmsg', $errMsg);

        createSession('username', $username);
        createSession('email', $email);
        createSession('firstname', $firstname);
        createSession('lastname', $lastname);

        header("location:../../register.php");

    } elseif ($row['firstName'] == $firstname || $row['lastName'] == $lastname) {

        $errMsg = "Sorry, first/last name already exist";
        createSession('errmsg', $errMsg);

        createSession('username', $username);
        createSession('email', $email);
        createSession('firstname', $firstname);
        createSession('lastname', $lastname);

        header("location:../../register.php");

    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $lastname = ucwords($lastname);
        $firstname = ucwords($firstname);

        $run = "INSERT INTO users (username, email, password, firstname, lastname, status) VALUES ('$username', '$email', '$password', '$firstname', '$lastname', 'user')";

        if ($conn->query($run) == true) {

            $msg = 'New user created';
            header("location:../../login.php");
            createSession('msg', $msg);


        } else {
            echo ($conn->error);
        }
    }

}


//login validation
if (isset($_POST['login'])){

    foreach ($_POST as $k => $v) {
        $_POST[$k] = test_inputs($v);
    }

    extract($_POST);
    $username = test_inputs($username);
    $password = test_inputs($password);

    $checkUser = "SELECT * FROM users WHERE username LIKE '$username'";
    $data = $conn->query($checkUser);
    $result = $data->fetch_assoc();

    if ($result['username'] == $username){

        if (password_verify($password, $result['password'])){

            $msg = 'Login successful';
            $user = $result['id'];

            createSession('msg', $msg);
            createSession('user', $user);
            header("location:../../index.php");


        } else {

            $msg = 'Incorrect password';

            createSession('msg', $msg);
            header("location:../../login.php");
        }

    } else {

        $msg = 'Username does not exist in database';

        createSession('msg', $msg);
        header("location:../../login.php");

    }

}

if (isset($_POST['rec_stock'])){

    extract($_POST);
    $sql = "INSERT INTO received_stock (product_name, UOM, supplier, amount, quantity, date) VALUES ('$prodname', '$uom', '$name', '$amt', '$qty', '$date')";
    stockProcessor($sql, 'receive_stock');

}

if (isset($_POST['supp_stock'])){

    extract($_POST);
    $sql = "INSERT INTO supplied_stock (product_name, UOM, customer_name, amount, quantity, date) VALUES ('$prodname', '$uom', '$name', '$amt', '$qty', '$date')";
    stockProcessor($sql, 'supply_stock');

}

if (isset($_POST['outstanding'])){


    extract($_POST);
    $sql = "INSERT INTO outstanding_products (product_name, UOM, quantity, amount, supplier, date) VALUES ('$prodname', '$uom', '$qty', '$amt', '$name', '$date')";
    stockProcessor($sql,  'outstanding');

}

if (isset($_POST['set-LS'])){


    extract($_POST);
    $sql = "UPDATE inventory_list SET low_point=$low_stock WHERE id=$id";
    stockProcessor($sql,  'inventory');

}

if (isset($_POST['inv'])){


    //in sql blow change d input qty to submit to column opening stock,xo here n others $qty=opening_stock vice versa
    extract($_POST);
    $sql = "INSERT INTO inventory (product_name, UOM, opening_stock, received, supplied, physical_stock, date) VALUES ('$prodname', '$uom', '$qty', '$received', '$supplied', '$phy', '$date')";
    stockProcessor($sql,  'index');

    $inv = "SELECT * FROM inventory_list WHERE product='$prodname' AND pack_size='$uom'";
    $stock = $conn->query($inv);

    if ($stock->num_rows > 0) {

        while ($row = $stock->fetch_assoc()) {

            $stock_id = $row['id'];

            $upd = "Update inventory_list set physical_stock='$phy' where id = $stock_id";
            $conn->query($upd) or die('could not update');

        }

    } else {

        $msg = 'Product not found, unable to update inventory list';

    }
}

//$sql = "INSERT INTO $table (product_name, UOM, supplier, amount, quantity, date) VALUES ('$prodname', '$uom', '$supp', '$amt', '$qty', '$date')";


//a function to process our stock forms
function stockProcessor($query, $ref) {

    global $conn;
    $sql = $query;

    if ($conn->query($sql) == true) {

        $msg = "New Record Created";
        createSession('msg', $msg);
        header("location:../../$ref.php?save=1");

    } else {
        echo($conn->error);
    }
}



//a session creator
function createSession($index, $value){
    $_SESSION[$index] = $value;
    return $_SESSION[$index];
}

function test_inputs($data) {
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
}
