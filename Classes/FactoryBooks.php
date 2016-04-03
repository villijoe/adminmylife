<?php

class FactoryBooks
{
    private $db;
    private $query = 'SELECT * FROM books WHERE reading = ?';
    private $stmt;
    private $array_books = array();

    public function __construct(ConnectDB $db, $mask) {
        $this->db = $db;
        if ($mask == 'all') $this->query = 'SELECT * FROM books';
        else if ($mask == 'reading') $this->query = 'SELECT * FROM books WHERE reading = TRUE';
        else if ($mask == 'read') $this->query = 'SELECT * FROM books WHERE reading = FALSE';
        $this->getData();
    }

    private function getData() {
        $this->stmt = $this->db->getConnection()->prepare($this->query);
        $this->stmt->execute();
        foreach($this->stmt as $row) {
            $book = new Book($row);
            $this->array_books[] = $book;
        }
    }

    public function getCollection() {
        return $this->array_books;
    }

    public function getOut() {
        echo '<table>';
        $i = 1;
        foreach($this->getCollection() as $book) {
            echo '<tr><td>'.$i.'</td>'.$book->getOutLine().'</tr>';
            $i++;
        }
        echo '</table>';
    }
}