<?php
$mysqlsunucu = "localhost";
$mysqlveritabani = "gezelim_gorelim";
$mysqlkullanici = "mert";
$mysqlsifre = "1hpk2wy5QQ";
try {
    $db = new PDO("mysql:host=$mysqlsunucu;dbname=$mysqlveritabani;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
     $e->getMessage();
    }


?>
