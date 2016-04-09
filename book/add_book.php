<?php
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "INSERT INTO books(title, writer, total_pages, reading_pages, reading, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
//echo $_POST['reading_pages'];
//echo $_POST['total_pages'];
if (isset($_POST['finish'])) { $reading = true; } else { $reading = false; }
$start_date = (empty($_POST['start_date'])) ? '0000-00-00' : $_POST['start_date'];
$end_date = (empty($_POST['end_date'])) ? '0000-00-00' : $_POST['end_date'];
//echo $_POST['title'];
//echo $_POST['writer'];
if (!$_POST['reading_pages']) { $reading_pages = 0; } else { $reading_pages = $_POST['reading_pages']; }
$stmt->execute([$_POST['title'], $_POST['writer'], $_POST['total_pages'], $reading_pages, $reading, $start_date, $end_date]);
header("Location: ../index.php?route=books");