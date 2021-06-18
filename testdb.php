<?php
require 'vendor/autoload.php';
$db = new database();

//GET
$user = $db->table('users')->offset(0)->limit(20)->get();
foreach($user as $values){
    echo $values->id;
    echo $values->name;
    echo "<br>";

}

//WHERE
$where =$db->table('users')->where([
    'email'=>'dieumi@gmail.com',
]);

print_r($where);

//SELECT * FROM products where ratings = 2 order by id limit 8"
$where1 = $db->table('products')->limit(1)->where([
    'ratings'=> '2',
]);
print_r($where1);
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