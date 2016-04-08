<?php

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $company = $_GET['company'];
    $finished_chapters = $_GET['finished_chapters'];
    $total_chapters = $_GET['total_chapters'];
    $action = $_GET['action'];
    $old_title = $_GET['title'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
} else {
    $title = '';
    $company = '';
    $finished_chapters = '';
    $total_chapters = '';
    $action = 'game/add_game.php';
    $old_title = '';
    $start_date = '';
    $end_date = '';
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
    <p>Start Date:</p>
    <input type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>" />
    <p>End Date:</p>
    <input type="date" name="end_date" id="end_date" value="<?php echo $end_date; ?>" />
    <p>Finished game: <input type="checkbox" name="finish" /> </p>
    <p><input type="submit" /></p>
</form>