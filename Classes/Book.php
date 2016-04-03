<?php


class Book
{
    private $title;
    private $writer;
    private $total_pages;
    private $reading_pages;
    private $reading;
    private $start_date;
    private $end_date;

    public function getTitle() {
        return $this->title;
    }

    public function getWriter() {
        return $this->writer;
    }

    public function getTotalPages() {
        return $this->total_pages;
    }

    public function getReadingPages() {
        return $this->reading_pages;
    }

    public function getReading() {
        return $this->reading;
    }

    public function __construct($arr) {
        $this->title = $arr['title'];
        $this->writer = $arr['writer'];
        $this->total_pages = $arr['total_pages'];
        $this->reading_pages = $arr['reading_pages'];
        $this->reading = $arr['reading'];
        $this->start_date = $arr['start_date'];
        $this->end_date = $arr['end_date'];
    }

    public function getPercentReading() {
        return $this->reading_pages/$this->total_pages;
    }

    public function getLeftReading() {
        return $this->total_pages - $this->reading_pages;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function getOutLine() {
        if ($this->reading) {
            $pages = '';
        } else {
            $pages = '<td>'.$this->reading_pages.'</td><td>'.$this->total_pages.'</td><td>'.$this->getPercentReading().'</td><td>'.
                $this->getLeftReading().'</td>';
        }
        return '<td>'.$this->title.'</td><td>'.$this->writer.'</td>'.$pages;
    }
}