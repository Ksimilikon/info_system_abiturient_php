<?php
require 'config.php';

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

$idUser=strip_tags($_POST['idUser']);
$login=strip_tags($_POST['login']);
$first_name=strip_tags($_POST['first_name']);
$last_name=strip_tags($_POST['last_name']);
$middle_name=strip_tags($_POST['middle_name']);


$update=$mysqli->query('UPDATE `ankets` SET `birthday`="'.$birthday.'", `citizenship`="'.$citizenship.'", `sex`="'.$sex.'",
 `adress`="'.$adress.'", `special`="'.$special.'", `tel`="'.$tel.'", `educ`="'.$educ.'",
  `date_educ`="'.$date_educ.'", `add_data`="'.$add_data.'", `lang`="'.$lang.'",
   `avg_attestat`="'.$avg_attestat.'", `parents_data`="'.$parents_data.'" WHERE `id_user` = "'.$idUser.'"');
$update1=$mysqli->query('UPDATE `users` SET `login`="'.$login.'", `first_name`="'.$first_name.'", `last_name`="'.$last_name.'", `middle_name`="'.$middle_name.'"
where `id`="'.$idUser.'"');
header('Location: admin.php');
exit;
