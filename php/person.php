<?php
require 'config.php';
session_start();
$idUser=$_SESSION['idUser'];
$personData=$mysqli->query('SELECT * FROM `users` WHERE `id` = "'.$idUser.'"');
$person=$personData->fetch_object();

//проверка на наличие анкеты
$anketData=$mysqli->query('SELECT * FROM `ankets` where `id_user` = "'.$idUser.'"');
$anket=$anketData->fetch_object();
if(empty($anket)){
    $haveAnket=false;
}
else{
    $haveAnket=true;
}

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
                        <th class="align_left pr20">Имя:</th>
                        <td class="align_left"><?=$person->first_name?></td>
                    </tr>
                    <tr>
                        <th class="align_left pr20">Фамилия:</th>
                        <td class="align_left"><?=$person->last_name?></td>
                    </tr>
                    <tr>
                        <th class="align_left pr20">Отчество:</th>
                        <td class="align_left"><?=$person->middle_name?></td>
                    </tr>
                </table>
            </div>
            <div class="col" style="align-items: end;">
            <?php
            if($haveAnket){
                echo '<a href="anket_edit.php"><button class="btn btn_color1 btn_text" style="font-weight: 400;">Редактировать анкету</button></a>';
            }
            else{
                echo '<a href="anket_make.php"><button class="btn btn_color1 btn_text" style="font-weight: 400;">Подать анкету</button></a>';
            }
            ?>
                <a href="exit.php"><button class="btn btn_color3 btn_text mt10" style="font-weight: 400;">Выйти</button></a>
            </div>
        </div>
        <?php
        if($haveAnket){
            echo '<div class="block per78 col mb20">
            <h2 class="head_block">Ваши данные</h2>
            <div class="inBlock align_left mt10">
                <div class="line mb20"></div>
                <p class="info_anketa">Дата рождения: <i class="light_text">'.$anket->birthday.'</i></p>
                <p class="info_anketa">Гражданство: <i class="light_text">'.$anket->citizenship.'</i></p>
                <p class="info_anketa">Пол: <i class="light_text">'.$anket->sex.'</i></p>
                <p class="info_anketa">Домашний адрес: <i class="light_text">'.$anket->adress.'</i></p>
                <p class="info_anketa">Выбранная специальность: <i class="light_text">'.$anket->special.'</i></p>
                <p class="info_anketa">Телефон: <i class="light_text">'.$anket->tel.'</i></p>
                <p class="info_anketa">Законченное образовательное учреждение: <i class="light_text">'.$anket->educ.'</i></p>
                <p class="info_anketa">Год окончания образовательного учреждения: <i class="light_text">'.$anket->date_educ.'</i></p>
                <p class="info_anketa">Дополнительные сведения: <i class="light_text">'.$anket->add_data.'</i></p>
                <p class="info_anketa">Изучаемый иностранный язык: <i class="light_text">'.$anket->lang.'</i></p>
                <p class="info_anketa">Средний балл аттестата: <i class="light_text">'.$anket->avg_attestat.'</i></p>
                <p class="info_anketa">Данные о родителях: <i class="light_text">'.$anket->parents_data.'</i></p>
                
            </div>
            <form action="export.php">
                <input class="btn btn_color1 btn_text mb20" type="submit" value="Экспорт в doc">
            </form>
        </div>';
        }
        ?>
        
    </main>
</body>
</html>