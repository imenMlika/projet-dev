<?php

require 'connexionDB.php';

$pdo-> exec("SET FOREIGN_KEY_CHECKS =0");

$pdo-> exec("DROP TABLE postes_commentaires");
$pdo-> exec("DROP TABLE postes_categories");
$pdo-> exec("DROP TABLE users_postes");
$pdo-> exec("DROP TABLE users");
$pdo-> exec("DROP TABLE postes");
$pdo-> exec("DROP TABLE commentaires");
$pdo-> exec("DROP TABLE categories");

$pdo-> exec("SET FOREIGN_KEY_CHECKS =1");



echo "DB supprimées" ; 