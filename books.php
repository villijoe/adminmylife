<?php
require_once "template/header.php";
require_once "Classes/Book.php";
require_once "Classes/FactoryBooks.php";
$query_all = "SELECT * FROM books";
$query_add = "INSERT INTO books(title) VALUES (?)";
?>

<a href="?route=books&books=all">Все</a>
<a href="?route=books&books=reading">Прочитанные</a>
<a href="?route=books&books=read">Не прочитанные</a>
<a href="?route=books&books=add_book">Добавить книгу</a>
    <a href="?route=books&books=add_book">Удалить книгу</a>
<br />

<?php

if (isset($_GET['books'])) {
    $b = $_GET['books']; // variable $books GET
    if ($b == 'all') {
        $factory = new FactoryBooks($db, $b);
        $factory->getOut();
    } if ($b == 'reading') {
        $factory = new FactoryBooks($db, $b);
        $factory->getOut();
    } if ($b == 'read') {
        $factory = new FactoryBooks($db, $b);
        $factory->getOut();
    }
    if ($b == 'add_book') { require_once "template/add_book_form.php"; }
} else {
    $factory = new FactoryBooks($db, 'all');
    $factory->getOut();
}

//echo $_SERVER['QUERY_STRING'];
require_once "template/footer.php";
?>