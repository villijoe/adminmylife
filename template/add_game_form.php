<?php

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $company = $_GET['company'];
    $finished_chapters = $_GET['finished_chapters'];
    $total_chapters = $_GET['total_chapters'];
    $action = $_GET['action'];
    $old_title = $_GET['title'];
} else {
    $title = '';
    $company = '';
    $finished_chapters = '';
    $total_chapters = '';
    $action = 'game/add_game.php';
    $old_title = '';
}

?>

<form method="post" action="<?php echo $action; ?>">
    <p>Book title*:</p>
    <input type="text" id="title" name="title" value="<?php echo $title; ?>" required autofocus />
    <p>Name company*:</p>
    <input type="text" id="company" name="company" value="<?php echo $company; ?>" required />
    <p>Finished chapters:</p>
    <input type="number" id="finished_chapters" value="<?php echo $finished_chapters; ?>" name="finished_chapters" />
    <p>Total_chapters:</p>
    <input type="number" id="total_chapters" value="<?php echo $total_chapters; ?>" name="total_chapters" required />
    <input type="hidden" name="old_title" value="<?php echo $old_title; ?>" />
    <p>Finished game: <input type="checkbox" name="finish" /> </p>
    <p><input type="submit" /></p>
</form>