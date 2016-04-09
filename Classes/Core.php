<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 09.04.2016
 * Time: 11:53
 */
class Core
{
    private $arr;

    public function __construct($arr) {
        $this->arr = $arr;
    }

    public function getTitle() {
        return $this->arr['title'];
    }

    public function getCreator() {
        return $this->arr['creator'];
    }

    public function getTotalSteps() {
        return $this->arr['total_steps'];
    }

    public function getFinishedSteps() {
        return $this->arr['finished_steps'];
    }

    public function getFinish() {
        return $this->arr['finish'];
    }

    public function getPercentFinished() {
        return (round($this->getFinishedSteps()/$this->getTotalSteps()*100, 2)).' %';
    }

    public function getLeftFinished() {
        return $this->getTotalSteps() - $this->getFinishedSteps();
    }

    public function getStartDate() {
        return $this->arr['start_date'];
    }

    public function getEndDate() {
        return $this->arr['end_date'];
    }

    public function getTotalDays() {
        $start = new DateTime($this->getStartDate());
        if ($this->getStartDate() == '0000-00-00') {
            return '0 days.';
        }
        $end = ($this->getEndDate() == '0000-00-00') ? new DateTime("now") : $this->getEndDate();
        $interval = $end->diff($start);
        return $interval->format('%a days.<br />');

    }

    public function getRequireGet() {
        return '&action='.$this->arr['key'].'/edit_'.$this->arr['key'].'.php'
        .'&title='.$this->getTitle()
        .'&creator='.$this->getCreator()
        .'&finished_steps='.$this->getFinishedSteps()
        .'&total_steps='.$this->getTotalSteps()
        .'&start_date='.$this->getStartDate()
        .'&end_date='.$this->getEndDate();
    }

    public function getOutLine($mask) {
        if ($this->getFinish() || ($mask == 'all' || $mask == 'finished')) {
            $pages = '';
        } else {
            $pages = '<td>'.$this->getFinishedSteps().'</td>'
                .'<td>'.$this->getTotalSteps().'</td>'
                .'<td>'.$this->getPercentFinished().'</td>'
                .'<td>'.$this->getLeftFinished().'</td>'
                .'<td>'.$this->getStartDate().'</td>'
                .'<td>'.$this->getEndDate().'</td>'
                .'<td>'.$this->getTotalDays().'</td>'
                .'<td class="edit"><a href="?route=games&games=add_game'.$this->getRequireGet().'"></a></td>';
        }
        return '<td>'.$this->getTitle().'</td>'
            .'<td>'.$this->getCreator().'</td>'
            .$pages;
    }
}