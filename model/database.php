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
    protected $and_or ='AND';
    
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

    public function condition($condition)
    {
        if($condition != 'or'){
            $this->and_or='and';
        }else{
            $this->and_or=$condition;
        }
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

    public function find_id($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->statement= $this->conn->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        
        return $returnData;
    }

    public function search($keyword)
    {
        $keywords = explode(' ', $keyword);
        $searchTermKeywords = array();
        $values= array();
        foreach ($keywords as $word) 
        {
            $searchTermKeywords[] = "name LIKE ?";
            $values[]="%{$word}%";
        }
        $like = implode(' OR ', $searchTermKeywords);
        $sql="SELECT * FROM $this->table WHERE $like LIMIT ?";
        $this->statement=$this->conn->prepare($sql);
        $dataType = str_repeat('s',count($values)).'i'; 
        $values[]=$this->limit;
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

    public function where($value1,$condition,$value2)
    {   
        $sql ="SELECT* FROM $this->table WHERE $value1 $condition ? ORDER BY id DESC LIMIT ?";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param('si',$value2,$this->limit);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        
        return $returnData;
    }

    public function whereAnd($data =[])
    {
        $keyValues=[];
        foreach($data as $key =>$values){
            $keyValues[] = str_replace( array('+', '@') , '', $key ).'=?';
        }
        $setField =implode(' '.$this->and_or.' ',$keyValues);
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
        // $this->connect();
        // $this->conn->query($sql);
        $this->statement=$this->conn->prepare($sql);
        $this->statement->execute();
        return $this->statement->affected_rows;
    }

}

// $this->statement->affected_rows;
// > 0 đại diện cho số dòng bị ảnh hưởng bới các truy vấn.
// 0 nếu không có dòng nào bị ảnh hưởng.
// -1 nếu có lỗi xảy ra.


class tableDB extends database{
    public function orders()
    {   
        $sql = "CREATE TABLE orders (
            id INT(9) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT(9) UNSIGNED NOT NULL,
            name VARCHAR(50) NOT NULL,
            address VARCHAR(200) NOT NULL,
            phone CHAR(20) NOT NULL,
            discount FLOAT NOT NULL DEFAULT 0,
            shipping_fee fLOAT NOT NULL DEFAULT 0,
            shipping_code CHAR(50),
            order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            order_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            order_status INT(3)
            ) DEFAULT CHARSET=utf8";

        $rs = $this->command($sql);
        echo $rs;
        
    }

    public function drop_orders(Type $var = null)
    {
        $sql ="DROP TABLE orders";
        $rs = $this->command($sql);
        echo $rs;

    }

}

// $dbs = new tableDB();
// $dbs->orders();
// $db->drop_orders();