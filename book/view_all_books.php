<?php
$query = "SELECT * FROM books";
$stmt = $conn->prepare($query);
$stmt->execute();
echo "<form method='post' action='book/delete_book.php'><ol>";
foreach($stmt as $row) {
    if ($row['reading_pages'] % $row['total_pages']) { $style = "no_equal"; $pages = " - ".$row['reading_pages']."/".$row['total_pages']; }
    else { $style = "equal"; $pages = ""; }

    echo "<li class='".$style."'> ".$row['title'].". ".$row['writer'].".".$pages
        ." <button name='id_book' value=".$row['id_book'].">X</button></li>";
}
echo "</ol></form>";