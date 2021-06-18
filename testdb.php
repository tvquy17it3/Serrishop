<?php
require 'vendor/autoload.php';
$db = new database();

$user = $db->table('users')->offset(1)->limit(20)->get();
// print_r($user);

foreach($user as $values){
    echo $values->id;
    echo $values->name;
    echo "<br>";

}
//`idcode`, `percent`, `description`, `counts`, `start`, `finish`
$result= $db->table('code')->insert([
    'idcode'=>random_int(0,10),
    'percent'=>'20',
    'counts' =>'10',
    'start'=> date('Y-m-d'),
    'finish'=> date('Y-m-d'),
]);

if ($result==1) {
    echo "ok";
}
$result = $db->table('code')->delete(random_int(0,10));
if ($result==1) {
    echo "ok";
}
