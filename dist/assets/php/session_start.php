<?php
session_start();
require_once 'assets/php/conn.php';

if (isset($_SESSION['msg'])){

    $msg = $_SESSION['msg'];
    $user = $_SESSION['user'];

} else {

    header("location:login.php");

}

$sql = "SELECT * FROM users WHERE id='$user'";
$data = $conn->query($sql);
$usuario = $data->fetch_assoc();

$curUser = $usuario['username'];

function clrSessionMsg(){

    $_SESSION['msg'] = '';

}

