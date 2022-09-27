<?php

class Admin {
    protected $id;
    protected $username;
    protected $password;

    /**
     * @param $username
     * @param $password
     * @param $type
     */
    public function __construct($username, $password, $id=null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id=$id;
    }

    public function __toString() {
        return $this->id. $this->username;
    }
    public function getNavigation(){
        return [];

    }

    public function canEdit(){
        return false;
    }

    private static function makeUser($u){
        if ($u['type']=='admin'){
            $user=new Admin($u['username'],$u['password'],$u['id']);
        }
        if ($u['type']=='superadmin'){
            $user=new superAdmin($u['username'],$u['password'],$u['id']);
        }
        return $user;
    }

    public static function getUser($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $u=$stm->fetch(PDO::FETCH_ASSOC);
        return self::makeUser($u);
    }

    public static function login($username, $password){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE username=?");
        $stm->execute([$username]);
        $u=$stm->fetch(PDO::FETCH_ASSOC);
        if (!$u){
            return null;
        }

        if (password_verify($password, $u['password'])){
            $_SESSION['uid']=$u['id'];
            return  self::makeUser($u);
        }
        return null;
    }

    public static function logout(){
        session_destroy();
        unset($_SESSION);
    }

    public static function auth(){
        if (!isset($_SESSION['uid'])){
            header('location: login.php');
            die();
        }
        $uid=$_SESSION['uid'];

        $user=Admin::getUser($uid);
        return $user;
    }

//    public static function passVerify($pass, $password) {
//        $pdo=DB::getPDO();
//        $stm=$pdo->prepare("SELECT * FROM users WHERE password=?");
//        $stm->execute([$password]);
//        $stm->fetch(PDO::FETCH_ASSOC);
//
//        $count = password_verify($pass, $password);
//
//        return $count;
//    }
}
