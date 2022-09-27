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


$user=Admin::auth();

if (isset($_GET['deleteCompany_id'])){
    $company=Company::getCompany($_GET['deleteCompany_id']);
    $company->deleteCompany();
    header("location:index.php");
    die();
}
if (isset($_GET['deleteCustomer_id'])){
    $company=Customer::getCustomer($_GET['deleteCustomer_id']);
    $company->deleteCustomer();
    header("location:index.php");
    die();
}


$blade2=new BladeOne();

echo $blade2->run("navbar", ["navbar", "user"=>$user]);


$companies = Company::getCompanies();
$blade=new BladeOne();
echo $blade->run("companies", ["companies"=>$companies, "user"=>$user]);

$customers = Customer::getCustomers();
$blade1=new BladeOne();
echo $blade1->run("customers", ["customers"=>$customers, "user"=>$user]);


