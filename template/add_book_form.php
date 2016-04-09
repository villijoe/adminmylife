<?php

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $writer = $_GET['writer'];
    $reading_pages = $_GET['reading_pages'];
    $total_pages = $_GET['total_pages'];
    $action = $_GET['action'];
    $old_title = $_GET['title'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
} else {
    $title = '';
    $writer = '';
    $reading_pages = '';
    $total_pages = '';
    $action = 'book/add_book.php';
    $old_title = '';
    $start_date = '';
    $end_date = '';
}

?>

<form method="post" action="<?php echo $action; ?>">
    <p>Book title*:</p>
    <input type="text" id="title" name="title" value="<?php echo $title; ?>" required autofocus />
    <p>Name writer*:</p>
    <input type="text" id="writer" name="writer" value="<?php echo $writer; ?>" required />
    <p>Reading pages:</p>
    <input type="number" id="reading_pages" value="<?php echo $reading_pages; ?>" name="reading_pages" />
    <p>Amount pages:</p>
    <input type="number" id="total_pages" value="<?php echo $total_pages; ?>" name="total_pages" required />
    <input type="hidden" name="old_title" value="<?php echo $old_title; ?>" />
    <p>Start Date:</p>
    <input type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>" />
    <p>End Date:</p>
    <input type="date" name="end_date" id="end_date" value="<?php echo $end_date; ?>" />
    <p>Finished book: <input type="checkbox" name="finish" /> </p>
    <p><input type="submit" /></p>
</form>