<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct(){
        $this->server = "kutnpvrhom7lki7u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "u96pvwhlmsk6tx60";
        $this->password = "z65rfg8uhctcdxlq";
        $this->dbName= "xuvo6vtvuvuyii89";
    }
    //Option 1: mysqli
    function connectToMySQL():mysqli{
        $conn = new mysqli($this->server,
        $this->username,$this->password,$this->dbName);

        if($conn->connect_error){
            die("Failed ".$conn->connect_error);
        }else{
            //echo "Connect!";
        }
        return $conn;
    }
    
    //option 2 : PDO
    function connectToPDO():PDO{
        try{
            $conn = new PDO("mysql:host=$this->server;
            dbname=$this->dbName",$this->username,
            $this->password);
            //echo "Connect! PDO";
        }catch(PDOException $e){
            die("Failed ".$e);
        }
        return $conn;
    }
}
$c = new Connect();
$c->connectToPDO();
//$c->connectToMySQL();
?>