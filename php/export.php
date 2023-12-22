<?php
require 'config.php';
session_start();
$idUser=$_SESSION['idUser'];
$anketData=$mysqli->query('SELECT * from `ankets` where `id_user`="'.$idUser.'"');
                $anket=$anketData->fetch_object();
$personsData=$mysqli->query('SELECT * FROM `users` WHERE `id`="'.$idUser.'"');
$persons=$personsData->fetch_object();

header('Content-type: application/vnd.ms-word');
header('Content-Disposition: attachment; Filename=Сводка '.$persons->login.'.doc');
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>

                
                    <p>Имя: <i>'<?=$persons->first_name?>'</i></p>
                    <p>Фамилия: <i>'<?=$persons->last_name?>'</i></p>
                    <p>Отчество: <i>'<?=$persons->middle_name?>'</i></p>
                    
                    <p>Дата рождения: <i>'<?=$anket->birthday?>'</i></p>
                    <p>Гражданство: <i>'<?=$anket->citizenship?>'</i></p>
                    <p>Пол: <i>'<?=$anket->sex?>'</i></p>
                    <p>Домашний адрес: <i>'<?=$anket->adress?>'</i></p>
                    <p>Выбранная специальность: <i>'<?=$anket->special?>'</i></p>
                    <p>Телефон: <i>'<?=$anket->tel?>'</i></p>
                    <p>Законченное образовательное учреждение: <i>'<?=$anket->educ?>'</i></p>
                    <p>Год окончания образовательного учреждения: <i>'<?=$anket->date_educ?>'</i></p>
                    <p>Дополнительные сведения: <i>'<?=$anket->add_data?>'</i></p>
                    <p>Изучаемый иностранный язык: <i>'<?=$anket->lang?>'</i></p>
                    <p>Средний балл аттестата: <i>'<?=$anket->avg_attestat?>'</i></p>
                    <p>Данные о родителях: <i>'<?=$anket->parents_data?>'</i></p>
                    
                
</body>
</html>
