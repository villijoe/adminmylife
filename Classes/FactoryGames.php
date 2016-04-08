<?php

class FactoryGames
{
    private $db;
    private $query;
    private $stmt;
    private $array_games = array();
    private $mask;
    private $base_table;

    public function __construct(ConnectDB $db, $mask) {
        $this->db = $db;
        $this->mask = $mask;
        if ($this->mask == 'all') {
            $this->query = 'SELECT * FROM games';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Компания</td></tr></thead>';
        }
        else if ($this->mask == 'finished') {
            $this->query = 'SELECT * FROM games WHERE finished = TRUE';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Компания</td></tr></thead>';
        }
        else if ($this->mask == 'process') {
            $this->query = 'SELECT * FROM games WHERE finished = FALSE';
            $this->base_table = '<thead><tr><td>#</td><td>Название</td><td>Компания</td><td>Пройдено</td><td>Общее кол.гл.</td>'.
                '<td>%</td><td>Осталось</td><td>Дата начала</td><td>Дата конца</td><td>Играю</td><td></td></tr></thead>';
        }
        $this->getData();
    }

    private function getData() {
        $this->stmt = $this->db->getConnection()->prepare($this->query);
        $this->stmt->execute();
        foreach($this->stmt as $row) {
            $game = new Game($row);
            $this->array_games[] = $game;
        }
    }

    public function getCollection() {
        return $this->array_games;
    }

    public function getOut() {
        echo '<table>';
        $i = 1;
        echo $this->base_table.'<tbody>';
        foreach($this->getCollection() as $game) {
            echo '<tr><td>'.$i.'</td>'.$game->getOutLine($this->mask).'</tr>';
            $i++;
        }
        echo '</tbody></table>';
    }
}