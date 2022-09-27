<?php

class superAdmin extends Admin {

    public function getNavigation(){
        return [
            ['link'=>'createCompany.php', 'name'=>'Sukurti naują kompaniją'],
            ['link'=>'createCustomer.php', 'name'=>'Sukurti naują klientą'],
        ];

    }
    public function canEdit()
    {
        return true;
    }
}
