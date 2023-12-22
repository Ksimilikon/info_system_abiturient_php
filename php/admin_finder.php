<?php
require 'config.php';
session_start();
$first_name=$_GET['first_name'];
$last_name=$_GET['last_name'];
$middle_name=$_GET['middle_name'];
$login=$_GET['login'];

//формирование условия поиска
$strFind='';
$strFindArr=array();
if(!empty($first_name)){
    $strFindArr[]='`first_name` = "'.$first_name.'"';
}
$strFindLast='';
if(!empty($last_name)){
    $strFindArr[]='`last_name` = "'.$last_name.'"';
}
$strFindMiddle='';
if(!empty($middle_name)){
    $strFindArr[]='`middle_name` = "'.$middle_name.'"';
}
$strFindLogin='';
if(!empty($login)){
    $strFindArr[]='`login` = "'.$login.'"';
}
for($i=0;$i<count($strFindArr)-1;$i++){
    $strFind=$strFind.$strFindArr[$i].' and ';
}
$strFind=$strFind.$strFindArr[count($strFindArr)-1];

//поиск
$query="SELECT * FROM `users` WHERE ".$strFind;
//echo $query;
$personsData=$mysqli->query($query);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
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
                        <td class="align_left"><?=$_SESSION['login']?></td>
                    </tr>
                </table>
            </div>
            <div class="col" style="align-items: end;">
                <a href="admin.php"><button class="btn btn_color1 btn_text mt10" style="font-weight: 400;">Назад</button></a>
            </div>
        </div>
        <?php
        for($i=0;$i<$personsData->num_rows;$i++){
            $persons=$personsData->fetch_object();
            if(!empty($persons)){
                $anketData=$mysqli->query('SELECT * from `ankets` where `id_user`="'.$persons->id.'"');
                $anket=$anketData->fetch_object();
                if(!empty($anket)){
                    echo '<div class="block per78 col mb20">
                <h2 class="head_block">'.$persons->login.'</h2>
                <div class="inBlock align_left mt10">
                    <div class="line mb20"></div>
                    <p class="info_anketa">Имя: <i class="light_text">'.$persons->first_name.'</i></p>
                    <p class="info_anketa">Фамилия: <i class="light_text">'.$persons->last_name.'</i></p>
                    <p class="info_anketa">Отчество: <i class="light_text">'.$persons->middle_name.'</i></p>
                    
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
                    <div class="col mb20">
                        <a href="admin_change.php?idForm='.$persons->id.'"><button class="btn btn_color1 btn_text mt10" style="font-weight: 400;">Изменить</button></a>
                    </div>
                
                </div>';
                }
                else{
                    echo '<div class="block per78 col mb20">
                    <h2 class="head_block">'.$persons->login.'</h2>
                    <div class="inBlock align_left mt10">
                        <div class="line mb20"></div>
                        <p class="info_anketa">Имя: <i class="light_text">'.$persons->first_name.'</i></p>
                        <p class="info_anketa">Фамилия: <i class="light_text">'.$persons->last_name.'</i></p>
                        <p class="info_anketa">Отчество: <i class="light_text">'.$persons->middle_name.'</i></p>
                        </div>
                        <div class="col mb20">
                        
                    </div>

                
                </div>';
                }
            }
            else{
                echo '<div class="block per78 col mb20">
                <h2 class="head_block">Пользователи не найденны</h2></div>';
            }
        }
        ?>
        
    </main>
</body>
</html>