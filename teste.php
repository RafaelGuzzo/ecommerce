<?php 
require_once("vendor/autoload.php");

use \Hcode\DB\Sql;
Use \Hcode\Model;



$sql = new Sql();

$results = $sql->select("select * from tb_users");

$data = $results[0];

array_push($data, ["outroArray" => $results[1]]);

$a = new Model();
$a->setData($data);
var_dump($data);

foreach ($data as $key => $value) {
    echo "<br>Key = " .$key ." value " .var_dump($value);
}

?>