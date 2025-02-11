<?php


 class Database 
{
    
    private $servername ="localhost";
    private $username ="root";
    private $password ="";
    private $dbName ="company";
    private $con;

    public function __construct() {

        $this->con = mysqli_connect($this->servername,$this->username,$this->password,$this->dbName);
        
    }

    public function insert($sql)  {

        if (mysqli_query($this->con , $sql)) {
            return "Add Successfully";
        }else {
            die("Error". mysqli_error());
        }
        
    }
 
    public function enc_password($pass) {

        return sha1($pass);
        
    }



    public function select_all($table){

        $sql = "select * from $table";

        return $reslut = mysqli_query($this->con,$sql);
        
    }

    public function select_one($table,$id){
        $sql = "select * from $table WHERE id = $id";
        $reslut = mysqli_query($this->con,$sql);
        $data = $reslut->fetch_assoc();

        return $data;



    }

    public function update($sql) {

        if (mysqli_query($this->con,$sql)) {
            return true;
        }else {
            return false;
        }
        
    }

    public function Delete($table,$id){
        $sql = "DELETE from $table WHERE id = $id";
        if( mysqli_query($this->con,$sql))
        {
            return true;
        }else {
            return false;
        }



    }











}
