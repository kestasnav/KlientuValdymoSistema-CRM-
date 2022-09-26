<?php

class Conversation {
    public $id;
    public $customer_id;
    public $date;
    public $conversation;

    private $customer;

    /**
     * @param $customer_id
     * @param $date
     * @param $conversation
     */
    public function __construct($id=null, $customer_id, $date=null, $conversation)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;

    }

    /**
     * @return mixed
     */
//    public static function getConversation($id=null){
//        $pdo=DB::getPDO();
//        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE id=?");
//        $stm->execute([$id]);
//        $conversations=[];
//        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
//            $conversations[]=new Conversation($c['id'],$c['customer_id'],$c['date'],$c['conversation']);
//        }
//
//        return $conversations;
//    }

//    public static function getCompany($id){
//        $pdo=DB::getPDO();
//        $stm=$pdo->prepare("SELECT * FROM companys WHERE id=?");
//        $stm->execute([$id]);
//        $c=$stm->fetch(PDO::FETCH_ASSOC);
//        $company=new Company($c['name'],$c['address'],$c['vat_code'],$c['company_name'],$c['phone'],$c['email'], $id);
//        return $company;
//    }


    public function getCustomers() {
        if ($this->customer==null){
            $this->customer=Customer::getCustomers();
        }
        return $this->customer;
    }

    public static function getConversation($customer_id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
        $stm->execute([$customer_id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $conversation=new Conversation($c['id'],$c['customer_id'],$c['date'],$c['conversation']);
        return $conversation;

    }
    public static function getConversations(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information");
        $stm->execute();
        $conversation=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $conversation[]=new Conversation($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
        }
        return $conversation;
    }

    public function createConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO contact_information (customer_id, conversation) VALUES (?,?)");
        $stm->execute([ $this->customer_id, $_POST['conversation'] ]);
    }

    public function updateConversation()
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, conversation=? WHERE id=?");
        $stm->execute([$this->customer_id, $this->date, $this->conversation, $this->id]);

    }

}