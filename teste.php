<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo[]" multiple="multiple">
    <input type="submit" value="enviar">
    </form>
</body>
</html>

<?php 
require_once("vendor/autoload.php");

use \Hcode\DB\Sql;
Use \Hcode\Model;
$files = $_FILES["arquivo"];
echo "<pre>";
print_r($files);
echo "</pre>";

foreach ($files as $key => $value) {
    # code...
}


?>