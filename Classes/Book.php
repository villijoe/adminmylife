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
        return (round($this->reading_pages/$this->total_pages*100, 2)).' %';
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

    public function getTotalDays() {
        $datetime1 = new DateTime($this->getStartDate());
        if ($this->getStartDate() == '0000-00-00') {
            return '0 days.';
        }
        $datetime2 = ($this->getEndDate() == '0000-00-00') ? new DateTime("now") : $this->getEndDate();
        $interval = $datetime2->diff($datetime1);
        return $interval->format('%a days.<br />');

    }

    public function getRequireGet() {
        return '&action=book/edit_book.php&title='.$this->getTitle().'&writer='.$this->getWriter().'&reading_pages='.$this->getReadingPages().'&total_pages='.
        $this->getTotalPages().'&start_date='.$this->getStartDate().'&end_date='.$this->getEndDate();
    }

    public function getOutLine($mask) {
        if ($this->reading || ($mask == 'all' || $mask == 'reading')) {
            $pages = '';
        } else {
            $pages = '<td>'.$this->reading_pages.'</td>'
                .'<td>'.$this->total_pages.'</td>'
                .'<td>'.$this->getPercentReading().'</td>'
                .'<td>'.$this->getLeftReading().'</td>'
                .'<td>'.$this->getStartDate().'</td>'
                .'<td>'.$this->getEndDate().'</td>'
                .'<td>'.$this->getTotalDays().'</td>'
                .'<td class="edit"><a href="?route=books&books=add_book'.$this->getRequireGet().'"></a></td>';
        }
        return '<td>'.$this->title.'</td><td>'.$this->writer.'</td>'.$pages;
    }
}