<?php
require_once "template/header.php";
$query_all = "SELECT * FROM books";
$query_add = "INSERT INTO books(title) VALUES (?)";
?>

<a href="?route=books&books=all">Все</a>
<a href="?route=books&books=reading">Прочитанные</a>
<a href="?route=books&books=read">Не прочитанные</a>
<a href="?route=books&books=add_book">Добавить книгу</a>
    <a href="?route=books&books=add_book">Удалить книгу</a>


<?php

if (isset($_GET['books'])) {
    $b = $_GET['books']; // variable $books GET
    if ($b == 'all') { require_once "book/view_all_books.php"; } if ($b == 'reading') { echo $b; } if ($b == 'read') { echo $b; }
    if ($b == 'add_book') { require_once "template/add_book_form.html"; }
} else {
    require_once "book/view_all_books.php";
}

//echo $_SERVER['QUERY_STRING'];
require_once "template/footer.php";
?>