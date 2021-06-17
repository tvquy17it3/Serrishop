<?php

class database{
    private $conn = null;
    private $host="localhost";
    private $user="root";
    private $pass ="";
    private $db ="serrishop";
    private $result =null;
    
    private function connect()
    {
        $this->conn= new mysqli($this->host,$this->user,$this->pass,$this->db)
        or die("connect fail!!");
        $this->conn->query('SET NAMES UTF8');

    }

    // pThuc select
    public function select($sql)
    {
        $this->connect();
        $this->result =$this->conn->query($sql);
    }

    public function fetch()
    {
        if($this->result->num_rows >0){
            $rows = $this->result->fetch_object();
        }else {
            $rows=0;
        }
        return $rows;
    }
    //insert update, detele

    public function command($sql)
    {
        $this->connect();
        $this->conn->query($sql);
    }

}