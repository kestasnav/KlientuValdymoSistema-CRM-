<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;


$createCompany=Company::getCompanies();
$blade2=new BladeOne();
echo $blade2->run("createCompany", ["createCompany"=>$createCompany]);



if (isset($_POST['action']) && $_POST['action']=='insert') {
    $createCompany = new Company(
        $_POST['name'],
        $_POST['address'],
        $_POST['vat_code'],
        $_POST['company_name'],
        $_POST['phone'],
        $_POST['email']);

    $createCompany->create();
    header("location:index.php");
    die();
}

