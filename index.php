<?php

include_once "DB.php";
include_once "Company.php";

//$company=Company::getCompany(6);
//        $company->name="IKI";
//        $company->save();

//$comp=Company::getCompany(1);
//$comp->delete();

//$cmp= new Company("Maxima","Silutes. pl 58","12547","UAB MAXIMA","86578789","maxe@maxima.lt");
//$cmp->create();




?>

<table border="1">
    <?php foreach (Company::getCompanys() as $company){ ?>
    <tr>
        <td><?=$company->name?></td>
        <td><?=$company->address?></td>
        <td><?=$company->vat_code?></td>
        <td><?=$company->company_name?></td>
        <td><?=$company->phone?></td>
        <td><?=$company->email?></td>
    </tr>
    <?php } ?>
</table>