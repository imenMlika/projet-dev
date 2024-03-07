<?php

$dns='mysql:host=localhost;dbname=blog_db';
$user='root';
$pwd='Ayimem123456789.';

try{
$pdo= new PDO($dns,$user,$pwd,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC


]);
echo ' connexion ok ';

} catch(PDOException $e){
    echo "error" . $e->getMessage();
}

