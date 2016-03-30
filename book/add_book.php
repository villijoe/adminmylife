<?php
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "INSERT INTO books(title, writer, total_pages, reading_pages) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
echo $_POST['reading_pages'];
if (!$_POST['reading_pages']) { $reading_pages = 0; } else { $reading_pages = $_POST['reading_pages']; }
$stmt->execute([$_POST['title'], $_POST['writer'], $_POST['total_pages'], $reading_pages]);
header("Location: ../index.php?route=books");