<?php
require 'config.php';
session_start();
$admin =$_SESSION['admin'];
$idUser=$_SESSION['idUser'];
$login=$_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <header>
        Абитуриент
    </header>
    <main>
        <div class="block per78 space_between pd40 mb20">
            <div>
                <table border="0">
                    <tr>
                        <th class="align_left pr20">Логин:</th>
                        <td class="align_left"><?=$login?></td>
                    </tr>
                </table>
            </div>
            <div class="col" style="align-items: end;">
                <a href="exit.php"><button class="btn btn_color3 btn_text mt10" style="font-weight: 400;">Выйти</button></a>
            </div>
        </div>
        <div class="block per78 col mb20">
            <h2 class="head_block">Найти</h2>
            <div class="inBlock align_left mt10">
                <div class="line mb20"></div>
                <form action="admin_finder.php" method="get" class="col mb10">
                    <input class="field_input mb10" type="text" placeholder="Имя" name="first_name">
                    <input class="field_input mb10" type="text" placeholder="Фамилия" name="last_name">
                    <input class="field_input mb10" type="text" placeholder="Отчество" name="middle_name">
                    <input class="field_input mb10" type="text" placeholder="Логин" name="login">
                    <input type="submit" value="Найти" class="btn btn_color1 btn_text">
                </form>
                
            </div>
            
        </div>
    </main>
</body>
</html>