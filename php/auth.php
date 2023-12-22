<?php
require 'config.php';
function errors_arr($array){
    foreach($array as $elem){
        echo $elem;
    }
}
$error='';
$login=$_POST['login'];
$password=$_POST['password'];
if(!empty($login) and !empty($password)){
    //проверка верности введенных данных
    $userCheck=$mysqli->query("SELECT `login`, `password`, `id`, `admin` FROM `users` WHERE `login` = '".$login."' AND `password` = '".$password."'");
    $userData=$userCheck->fetch_object();
    if(!empty($userData)){
        session_start();
        $_SESSION['idUser']=$userData->id;
        $_SESSION['login']=$login;
        $_SESSION['admin']=$userData->admin;
        if($userData->admin==1)
        {
            header("Location: admin.php");
            exit();
        }
        else{
            header("Location: person.php");
            exit();  
        }
    }
    else{
    $error='<p>Неправильный  логин или пароль</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <header>
        Абитуриент
    </header>
    <main>
        <div class="block per30">
            <form action="auth.php" method="post" class="col">
                <input type="text" name="login" class="field_input" placeholder="Логин">
                <input type="password" name="password" class="field_input" placeholder="Пароль">
                <div class="error">
                    <?=$error?>
                </div>
                <input type="submit" value="Войти" class="btn btn_color1 btn_text">
                <br>
            </form>
        </div>
    </main>
</body>
</html>
