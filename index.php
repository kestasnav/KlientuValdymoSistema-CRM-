<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;


if (isset($_GET['deleteCompany_id'])){
    $company=Company::getCompany($_GET['deleteCompany_id']);
    $company->deleteCompany();
}
if (isset($_GET['deleteCustomer_id'])){
    $company=Customer::getCustomer($_GET['deleteCustomer_id']);
    $company->deleteCustomer();
}
//$cmp= new Company("Maxima","Silutes. pl 58","12547","UAB MAXIMA","86578789","maxe@maxima.lt");
//$cmp->create();
$companies = Company::getCompanies();
$blade=new BladeOne();
echo $blade->run("companies", ["companies"=>$companies]);

$customers = Customer::getCustomers();
$blade1=new BladeOne();
echo $blade1->run("customers", ["customers"=>$customers]);




