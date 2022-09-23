<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;




$createCustomer=Customer::getCustomers();

$companies=Company::getCompanies();

if (isset($_POST['action']) && $_POST['action']=='insert') {
    $createCustomer = new Customer(
        $_POST['name'],
        $_POST['surname'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['address'],
        $_POST['position'],
        $_POST['company_id']);

    $createCustomer->create();

    $conversation = new Conversation( $createCustomer->id, $_POST['conversation']);
    $conversation->createConversation();

    header("location:index.php");
    die();
}

$blade3=new BladeOne();

echo $blade3->run("createCustomer", ["createCustomer"=>$createCustomer, "companies"=>$companies]);


