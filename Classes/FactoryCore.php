<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 09.04.2016
 * Time: 12:11
 */
class FactoryCore
{
    private $db;
    private $query;
    private $stmt;
    private $array_books = array();
    private $mask;
    private $base_table;

    public function __construct(ConnectDB $db, $mask) {
        $this->db = $db;
        $this->mask = $mask;
        if ($this->mask == 'all') {
            $this->query = 'SELECT * FROM books';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Автор</td></tr></thead>';
        }
        else if ($this->mask == 'reading') {
            $this->query = 'SELECT * FROM books WHERE reading = TRUE';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Автор</td></tr></thead>';
        }
        else if ($this->mask == 'read') {
            $this->query = 'SELECT * FROM books WHERE reading = FALSE';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Автор</td><td>Прочитано</td><td>Общее кол.стр.</td>'.
                '<td>%</td><td>Осталось</td><td>Начало</td><td>Конец</td><td>Потрачено</td><td></td></tr></thead>';
        }
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
        echo $this->base_table.'<tbody>';
        foreach($this->getCollection() as $book) {
            echo '<tr><td>'.$i.'</td>'.$book->getOutLine($this->mask).'</tr>';
            $i++;
        }
        echo '</tbody></table>';
    }
}