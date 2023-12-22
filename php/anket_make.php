<?php
require 'config.php';
function variant_list($request, $strData){
    //$request=$mysqli->query($request);
    for($i=0;$i<$request->num_rows;$i++){
        $result= $request->fetch_assoc();
        echo '<option>'.$result[$strData].'</option>';
    }
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

                </div>
                <input type="submit" value="Отправить" class="btn btn_color1 btn_text mb10">
            </form>
        </div>
    </main>
</body>
</html>