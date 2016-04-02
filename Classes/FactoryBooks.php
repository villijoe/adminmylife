<?php

class FactoryBooks
{
    private $mask;
    private $db;
    private $query = 'SELECT * FROM books WHERE mask = ?';
    private $stmt;
    private $array_books = array();

    public function __construct(ConnectDB $db, $mask) {
        $this->db = $db;
        $this->mask = $mask;
        $this->getData();
    }

    private function getData() {
        $this->stmt = $this->db->getConnection()->prepare($this->query);
        $this->stmt->execute([$this->mask]);
        foreach($this->stmt as $row) {
            $book = new Book($row);
            $this->array_books[] = $book;
        }
    }

    public function getCollection() {
        return $this->array_books;
    }
}