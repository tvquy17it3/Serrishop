<?php

class database{
    private $conn = null;
    private $host="localhost";
    private $user="root";
    private $pass ="";
    private $db ="serrishop";
    protected $result = null;
    protected $statement = null;
    protected $table="";
    protected $limit = 20;
    protected $offset= 0;
    
    private function connect()
    {
        $this->conn= new mysqli($this->host,$this->user,$this->pass,$this->db)
        or die("connect fail!!");
        $this->conn->query('SET NAMES UTF8');
    }

    public function __construct()
    {
        $this->connect();
    }

    public function table($tableName)
    {
        $this->table=$tableName;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit=$limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->offset=$offset;
        return $this;
    }

    public function get()
    {
        $sql = "SELECT * FROM $this->table LIMIT ? OFFSET ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('ii', $this->limit,$this->offset);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        
        return $returnData;
    }

    public function where($data =[])
    {
        //SELECT * FROM users WHERE email=11 and pass=11  order by id limit 8
        $keyValues=[];
        foreach($data as $key =>$values){
            $keyValues[] = $key.'=?';
        }
    
        $setField =implode(' and ',$keyValues);
        $values = array_values($data);
        $values[]=$this->limit;

        $sql ="SELECT* FROM $this->table WHERE $setField ORDER BY id DESC LIMIT ?";
        $this->statement=$this->conn->prepare($sql);
        $dataType = str_repeat('s',count($data)).'i';
        $this->statement->bind_param($dataType,...$values);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        
        return $returnData;
    }

    public function insert($data=[])
    {
        $fields = implode(',',array_keys($data));
        $valuesStr= implode(',',array_fill(0, count($data), '?'));
        $values = array_values($data);

        $sql = "INSERT INTO $this->table($fields) value($valuesStr)";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param( str_repeat('s',count($data)),...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }

    public function update($id,$data= [])
    {
        $keyValues =[];
        foreach($data as $key =>$values){
            $keyValues[]=$key.'=?';
        }
        $setField =implode(',',$keyValues);
        $values = array_values($data);
        $values[]=$id;

        $sql = "UPDATE $this->table SET $setField WHERE id=?";
        $this->statement=$this->conn->prepare($sql);
        $dataType = str_repeat('s',count($data)).'i';
        $this->statement->bind_param($dataType,...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;

    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id= ?";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }

    public function resetQuery()
    {
        $this->table="";
        $this->limit = 20;
        $this->offset= 0;
    }

    public function select($sql)
    {
        // $this->connect();
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

// $this->statement->affected_rows;
// > 0 đại diện cho số dòng bị ảnh hưởng bới các truy vấn.
// 0 nếu không có dòng nào bị ảnh hưởng.
// -1 nếu có lỗi xảy ra.