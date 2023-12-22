<?php
require 'config.php';
$login=$_POST['login'];
$password=$_POST['password'];
$passwordR=$_POST['passwordR'];
$last_name=$_POST['last_name'];
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];

$errors=array();
if(empty($login)){
    $errors[]= '<p>Введите логин</p>';
}
if(empty($password)){
    $errors[]= '<p>Введите пароль</p>';
}
if(empty($passwordR)){
    $errors[]= '<p>Введите повтор пароля</p>';
}
if(empty($first_name)){
    $errors[]= '<p>Введите имя</p>';
}
if(empty($last_name)){
    $errors[]= '<p>Введите фамилию</p>';
}
if($password!=$passwordR){
    $errors[]='<p>Пароли не совпадают</p>';
}
$log=$mysqli->query('SELECT `login` FROM `users` where `login`="'.$login.'"');
$log=$log->fetch_object();
if(!empty($log->login)){
    $errors[]='<p>Такой логин уже существует</p>';
}
if(empty($errors[0]) and !empty($login) and !empty($password)){
    $new=$mysqli->query('INSERT INTO `users` (`login`, `password`, `last_name`, `first_name`, `middle_name`)
    values("'.$login.'", "'.$password.'", "'.$last_name.'", "'.$first_name.'", "'.$middle_name.'")');
    $personData=$mysqli->query('SELECT `id` FROM `users` where `login`="'.$login.'" and `password`="'.$password.'"');
    $person=$personData->fetch_object();
    session_start();
    $_SESSION['idUser']=$person->id;
    $_SESSION['login']=$login;
    $_SESSION['admin']=null;
    header('Location: person.php');
    exit();
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <header>
        Абитуриент
    </header>
    <main>
        <div class="block per30">
            <form action="reg.php" method="post" class="col">
                <input type="text" name="login" class="field_input" placeholder="Логин">
                <input type="text" name="last_name" class="field_input" placeholder="Фамилия">
                <input type="text" name="first_name" class="field_input" placeholder="Имя">
                <input type="text" name="middle_name" class="field_input" placeholder="Отчество">

                <input id="pass1" type="password" name="password" class="field_input" placeholder="Пароль">
                <input id="pass2" type="password" name="passwordR" class="field_input" placeholder="Повтор пароля">

                <div class="error">
                    <?php
                    foreach($errors as $error){
                        echo $error;
                    }
                    ?>
                </div>
                <input type="submit" value="Регистрация" class="btn btn_color1 btn_text">
                <br>
            </form>
        </div>
    </main>
</body>
</html>