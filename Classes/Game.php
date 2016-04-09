<?php


class Game
{
    private $title;
    private $company;
    private $total_chapters;
    private $finished_chapters;
    private $finished;
    private $start_date;
    private $end_date;

    public function getTitle() {
        return $this->title;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getTotalChapters() {
        return $this->total_chapters;
    }

    public function getFinishedChapters() {
        return $this->finished_chapters;
    }

    public function getFinished() {
        return $this->finished;
    }

    public function __construct($arr) {
        $this->title = $arr['title'];
        $this->company = $arr['company'];
        $this->total_chapters = $arr['total_chapters'];
        $this->finished_chapters = $arr['finished_chapters'];
        $this->finished = $arr['finished'];
        $this->start_date = $arr['start_date'];
        $this->end_date = $arr['end_date'];
    }

    public function getPercentFinished() {
        return (round($this->finished_chapters/$this->total_chapters*100, 2)).' %';
    }

    public function getLeftFinished() {
        return $this->total_chapters - $this->finished_chapters;
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
        return '&action=game/edit_game.php&title='.$this->getTitle().'&company='.$this->getCompany().'&finished_chapters='.$this->getFinishedChapters()
        .'&total_chapters='.$this->getTotalChapters().'&start_date='.$this->getStartDate().'&end_date='.$this->getEndDate();
    }

    public function getOutLine($mask) {
        if ($this->finished || ($mask == 'all' || $mask == 'finished')) {
            $pages = '';
        } else {
            $pages = '<td>'.$this->finished_chapters.'</td><td>'.$this->total_chapters.'</td><td>'.$this->getPercentFinished().'</td><td>'.
                $this->getLeftFinished().'</td><td>'.$this->getStartDate().'</td><td>'.$this->getEndDate()
                .'</td><td>'.$this->getTotalDays().'</td><td class="edit"><a href="?route=games&games=add_game'.$this->getRequireGet().'"></a></td>';
        }
        return '<td>'.$this->title.'</td><td>'.$this->company.'</td>'.$pages;
    }
}