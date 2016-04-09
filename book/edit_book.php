<?php
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "UPDATE books SET title=?, writer=?, total_pages=?, reading_pages=?, reading=?, start_date=?, end_date=? WHERE title=?";
$stmt = $conn->prepare($query);
//echo $_POST['reading_pages'];
//echo $_POST['total_pages'];
if (isset($_POST['finish'])) { $reading = true; } else { $reading = false; }
$end_date = (empty($_POST['end_date'])) ? '0000-00-00' : $_POST['end_date'];
//echo $_POST['title'];
//echo $_POST['writer'];
if (!$_POST['reading_pages']) { $reading_pages = 0; } else { $reading_pages = $_POST['reading_pages']; }
$stmt->execute([$_POST['title'], $_POST['writer'], $_POST['total_pages'], $reading_pages, $reading, $_POST['start_date'], $end_date, $_POST['old_title']]);
header("Location: ../index.php?route=books&books=read");