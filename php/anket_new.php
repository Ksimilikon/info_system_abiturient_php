<?php
require 'config.php';
function variant_list($request, $strData){
    //$request=$mysqli->query($request);
    for($i=0;$i<$request->num_rows;$i++){
        $result= $request->fetch_assoc();
        echo '<option>'.$result[$strData].'</option>';
    }
}

?><?php
$birthday=strip_tags($_POST['birthday']);
$citizenship=strip_tags($_POST['citizenship']);
$sex=strip_tags($_POST['sex']);
$adress=strip_tags($_POST['adress']);
$special=strip_tags($_POST['special']);
$tel=strip_tags($_POST['tel']);
$educ=strip_tags($_POST['educ']);
$date_educ=strip_tags($_POST['date_educ']);
$add_data=strip_tags($_POST['add_data']);
$lang=strip_tags($_POST['lang']);
$avg_attestat=strip_tags($_POST['avg_attestat']);
$parents_data=strip_tags($_POST['parents_data']);


$errors=array();
$solutions=array();
$property=array($birthday, $citizenship, $sex, $adress, $special, $tel, $educ, $date_educ, $add_data, $lang, $avg_attestat, $parents_data);
if(empty($property[0])){
    $errors[]='<p>Введите дату рождения</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[1])){
    $errors[]='<p>Введите гражданство</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if($property[2]=='Не выбран'){
    $errors[]='<p>Выберите пол</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[3])){
    $errors[]='<p>Введите адрес</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if($property[4]=='Не выбран'){
    $errors[]='<p>Выберите специальность</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[5])){
    $errors[]='<p>Введите телефон</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[6])){
    $errors[]='<p>Введите оконченное образовательное учреждение</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[7])){
    $errors[]='<p>Введите год окончания образовательного учреждения</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if($property[8]=="Не выбран"){
    $errors[]='<p>Выберите дополнительные сведения</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if($property[9]=="Не выбран"){
    $errors[]='<p>Выберите изучаемый язык</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[10])){
    $errors[]='<p>Введите средний балл аттестата</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
if(empty($property[11])){
    $errors[]='<p>Введите сведения о родителях</p>';
    $solutions[]=false;
}
else{
    $solutions=true;
}
$permission=true;
foreach($solutions as $solution){
    if(!$solution){
        $permission=false;
        break;
    }
}

if($permission){
    session_start();
    $idUser=$_SESSION['idUser'];
    $anketData=$mysqli->query('SELECT * FROM `ankets` where `id_user` = "'.$idUser.'"');
    $anket=$anketData->fetch_object();
    if(empty($anket)){
        $haveAnket=false;
    }
    else{
        $haveAnket=true;
    }
    if(!$haveAnket){
    $mysqli->query("INSERT INTO `ankets` (`id_user`, `birthday`, `citizenship`, `sex`, `adress`, `special`, `tel`, `educ`, `date_educ`, `add_data`, `lang`, `avg_attestat`, `parents_data`) 
    VALUES ('".$idUser."', '".$birthday."', '".$citizenship."', '".$sex."', '".$adress."', '".$special."', '".$tel."', '".$educ."', '".$date_educ."', '".$add_data."', '".$lang."', '".$avg_attestat."', '".$parents_data."')");
    }
    header('Location: person.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заполнение анкеты</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <header>
        Абитуриент
    </header>
    <main>
        <div class="block per30 col mb20">
            <h2 class="head_block">Анкета</h2>
            <form action="anket_new.php" method="post" class="col mt10">
                <div class="line mb20"></div>
                <div class="col mb10 per100">
                    <p class="text_regular">Дата рождения</p>
                    <input class="field_input" type="date" name="birthday">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Гражданство</p>
                    <input class="field_input" type="text" name="citizenship">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Пол</p>
                    <select class="field_input" name="sex">
                        <option>Не выбран</option>
                        <option>Мужской</option>
                        <option>Женский</option>
                    </select>
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Домашний адрес</p>
                    <input class="field_input" type="text" name="adress">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Выбранная специальность</p>
                    <select class="field_input" name="special">
                        <option>Не выбран</option>
                        <?php
                        variant_list($mysqli->query('SELECT * FROM `specialize`'), 'special');
                        ?>
                    </select>
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Телефон</p>
                    <input class="field_input" type="tel" name="tel">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Законченное образовательное учреждение</p>
                    <input class="field_input" type="text" name="educ">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Год окончания этого учреждения</p>
                    <input class="field_input" type="text" name="date_educ">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Дополнительные сведения</p>
                    <select class="field_input" name="add_data">
                        <option>Не выбран</option>
                        <?php
                        variant_list($mysqli->query('SELECT * FROM `add_info`'), 'add_data');
                        ?>
                    </select>
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Изучаемый иностранный язык</p>
                    <select class="field_input" name="lang">
                        <option>Не выбран</option>
                        <?php
                        variant_list($mysqli->query('SELECT * FROM `language`'), 'lang');
                        ?>
                    </select>
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Средний балл аттестата</p>
                    <input class="field_input" type="text" name="avg_attestat">
                </div>
                <div class="col mb10 per100">
                    <p class="text_regular">Данные о родителях</p>
                    <textarea name="parents_data" class="field_input" id="" style="resize: vertical;"></textarea>
                </div>
                <div class="error">
                    <?php
                    foreach($errors as $error){
                        echo $error;
                    }
                    ?>
                </div>
                <input type="submit" value="Отправить" class="btn btn_color1 btn_text mb10">
            </form>
        </div>
    </main>
</body>
</html>
