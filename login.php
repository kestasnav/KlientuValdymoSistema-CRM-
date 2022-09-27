<?php
session_start();
include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
include_once "Admin.php";
include_once "superAdmin.php";
use eftec\bladeone\BladeOne;

if (isset($_GET['action']) && $_GET['action']=='logout'){
    Admin::logout();
}

$pdo = DB::getPDO();
$message = "";
if (isset($_POST['action'])){
    $pass = $_POST['password'];
   $passHash= password_hash($pass,PASSWORD_BCRYPT);
   //print_r($pass);
   print_r($passHash);

    $user=Admin::login($_POST['username'], $pass);



    if ($user){
        header('location: index.php');
        die();
    } else {
       $message =  'Neteisingas Vartotojo vardas arba slaptažodis';
        }
}

$blade=new BladeOne();

echo $blade->run("login", ["login", "message"=>$message]);




