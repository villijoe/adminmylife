<?php
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "UPDATE games SET title=?, company=?, total_chapters=?, finished_chapters=?, finished=?, start_date=?, end_date=? WHERE title=?";
$stmt = $conn->prepare($query);
//echo $_POST['reading_pages'];
//echo $_POST['total_pages'];
if (isset($_POST['finish'])) { $finished = true; } else { $finished = false; }
//echo $end_date;
$end_date = (empty($_POST['end_date'])) ? '0000-00-00' : $_POST['end_date'];
//echo $end_date;
//echo $_POST['start_date'];
//echo $_POST['writer'];
// $finished_chapters = (empty($_POST['finished_chapters'])) ? 0 : $_POST['finished_chapters'];
if (!$_POST['finished_chapters']) { $finished_chapters = 0; } else { $finished_chapters = $_POST['finished_chapters']; }
$stmt->execute([$_POST['title'], $_POST['company'], $_POST['total_chapters'], $finished_chapters, $finished, $_POST['start_date'], $end_date, $_POST['old_title']]) or die('no send');
header("Location: ../index.php?route=games&games=process");