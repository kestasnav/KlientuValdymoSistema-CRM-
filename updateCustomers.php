<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;


$companies=Company::getCompanies();

$updateCustomers=Customer::getCustomer($_GET['id']);

if (isset($_POST['action']) && $_POST['action']=='update') {
    $updateCustomers->name=$_POST['name'];
    $updateCustomers->surname=$_POST['surname'];
    $updateCustomers->phone=$_POST['phone'];
    $updateCustomers->email=$_POST['email'];
    $updateCustomers->surname=$_POST['address'];
    $updateCustomers->position=$_POST['position'];
    $updateCustomers->company_id=$_POST['company_id'];
    $updateCustomers->save();

    header("location:index.php");
    die();
}

$blade3=new BladeOne();

echo $blade3->run("updateCustomers", ["updateCustomers"=>$updateCustomers, "companies"=>$companies]);
