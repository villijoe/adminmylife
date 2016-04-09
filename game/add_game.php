<?php
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "INSERT INTO games(title, company, total_chapters, finished_chapters, finished, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
//echo $_POST['finished_chapters'];
//echo $_POST['total_chapters'];
//echo isset($_POST['finish']);
if (isset($_POST['finish'])) { $finished = true; } else { $finished = false; }
$start_date = (empty($_POST['start_date'])) ? '0000-00-00' : $_POST['start_date'];
$end_date = (empty($_POST['end_date'])) ? '0000-00-00' : $_POST['end_date'];
//echo $_POST['title'];
//echo $_POST['company'];
//echo $finished;
if (!$_POST['finished_chapters']) { $finished_chapters = 0; } else { $finished_chapters = $_POST['finished_chapters']; }
//echo $finished_chapters;
$stmt->execute([$_POST['title'], $_POST['company'], $_POST['total_chapters'], $finished_chapters, $finished, $start_date, $end_date]);
header("Location: ../index.php?route=games");