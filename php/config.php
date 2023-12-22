<?php
$db_host='localhost';
$db_user='root';
$db_password='';
$db_name='IS_abiturient';

//соеденение
$mysqli=new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->query("SET NAMES 'UTF8'");
//проверка соеденения
if($mysqli->connect_errno){
    echo "Не удалось подключиться к MySQL: ". $mysqli->connect_error;
}
