<?php
//раскоменнтировать для работы
//require '../php/config.php';
$delete=$mysqli->query('TRUNCATE TABLE `language`');
$lines = file('lang.txt');
foreach ($lines as $line) {
    echo $line;
    $addUser=$mysqli->query("INSERT INTO `language` (`lang`)
        VALUES('".$line."')");
}