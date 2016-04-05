<?php
require_once "template/header.php";
require_once "Classes/Game.php";
require_once "Classes/FactoryGames.php";
//$query_all = "SELECT * FROM books";
//$query_add = "INSERT INTO books(title) VALUES (?)";
?>

    <a href="?route=games&games=all">Все</a>
    <a href="?route=games&games=finished">Пройденные</a>
    <a href="?route=games&games=process">Не пройденные</a>
    <a href="?route=games&games=add_game">Добавить игру</a>
    <br />

<?php

if (isset($_GET['games'])) {
    $b = $_GET['games']; // variable $books GET
    if ($b == 'all') {
        $factory = new FactoryGames($db, $b);
        $factory->getOut();
    } if ($b == 'finished') {
        $factory = new FactoryGames($db, $b);
        $factory->getOut();
    } if ($b == 'process') {
        $factory = new FactoryGames($db, $b);
        $factory->getOut();
    }
    if ($b == 'add_game') { require_once "template/add_game_form.php"; }
} else {
    $factory = new FactoryGames($db, 'all');
    $factory->getOut();
}

//echo $_SERVER['QUERY_STRING'];
require_once "template/footer.php";