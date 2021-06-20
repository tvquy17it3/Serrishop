<?php
require 'vendor/autoload.php';
$db = new database();

//GET
// $user = $db->table('users')->offset(0)->limit(20)->get();
// foreach($user as $values){
//     echo $values->id;
//     echo $values->name;
//     echo "<br>";

// }

//WHERE,| nếu count($data)>=2, mặc định condition là 'and' hoặc có thể thay bằng ->condition('or')
// $where =$db->table('users')->condition('and')->whereAnd([
//     'email'=>'admin@gmail.com',
//     'password'=>md5('123456')
// ]);

// print_r($where);
// $where =$db->table('products')->condition('or')->limit(2)->whereAnd([
//     'ratings'=>'1',
//     '@ratings'=>'2'
// ]);
// print_r($where);
// $where =$db->table('users')->where('id','=',1);
// print_r($where);

//SELECT * FROM products where ratings = 2 order by id limit 8"
// $where1 = $db->table('products')->limit(3)->where('ratings','=','2');
// echo '<br>';
// print_r($where1);

// $findid = $db->table('users')->find_id(1);
// print_r($findid);
error_reporting(E_ALL);
ini_set('display_errors', 1);

$search = $db->table('products')->limit(3)->search('Dam');
print_r($search);
// UPDATE
// $db->table('users')->update(7,[
//     'name'=> 'Văn Quý 123',
//     'gender'=>'nam',
//     'phone' => '012331',
//     'address' =>'Đà Nẵng1'
// ]);
// if ($user1<0) {
//     echo "Error".$user1;
// }else{
//     echo 'OK'.$user1;
// }

// INSERT
// `idcode`, `percent`, `description`, `counts`, `start`, `finish`
// $db->table('code')->insert([
//     'idcode'=>random_int(0,10),
//     'percent'=>'20',
//     'counts' =>'10',
//     'start'=> date('Y-m-d'),
//     'finish'=> date('Y-m-d'),
// ]);

// DELETE
// $db->table('code')->delete(random_int(0,10));
// if ($result==1) {
//     echo "ok";
// }
// SELECT users.*, stores.*, products.* 
// FROM stores, products, users 
// WHERE ((users.id) 
// AND (stores.user_id) 
// AND (products.user_id))