<?php

require 'connexionDB.php';

$pdo-> exec("SET FOREIGN_KEY_CHECKS =0");

$pdo-> exec("TRUNCATE postes_commentaires");
$pdo-> exec("TRUNCATE postes_categories");
$pdo-> exec("TRUNCATE users_postes");
$pdo-> exec("TRUNCATE users");
$pdo-> exec("TRUNCATE postes");
$pdo-> exec("TRUNCATE commentaires");
$pdo-> exec("TRUNCATE categories");

$pdo-> exec("SET FOREIGN_KEY_CHECKS =1");



echo "DB nettoyées" ; 