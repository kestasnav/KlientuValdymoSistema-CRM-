<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;




$updateCompany=Company::getCompany($_GET['id']);

if (isset($_POST['action']) && $_POST['action']=='update') {
    $updateCompany->name=$_POST['name'];
    $updateCompany->address=$_POST['address'];
    $updateCompany->vat_code=$_POST['vat_code'];
    $updateCompany->company_name=$_POST['company_name'];
    $updateCompany->phone=$_POST['phone'];
    $updateCompany->email=$_POST['email'];
    $updateCompany->save();

    header("location:index.php");
    die();
}

$blade2=new BladeOne();

echo $blade2->run("updateCompany", ["updateCompany"=>$updateCompany]);



