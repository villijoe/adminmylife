<?php
header("Location: ../index.php?route=books");
$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");
$query = "DELETE FROM books WHERE id_book = ?";
echo $_POST['id_book'];
$stmt = $conn->prepare($query);
$stmt->execute([$_POST['id_book']]);
header("Location: ../index.php?route=books");