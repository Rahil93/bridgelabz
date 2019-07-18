<?php

interface subject
{
    public function registerObserver();
    public function unregisterObserver();
    public function notifyObserver();
}

class CricketData
{
    private $run;
    private $wicket;
    private $over;
    private $observerlist;
    private $i = 0;

    public function __construct()
    {
        $this->observerlist = array();
    }

    public function registerObserver(String $obs)
    {
        $this->observerlist[$this->i++] = array($obs);
    }

    public function unregisterObserver(String $obs)
    {
        foreach ($this->observerlist as $key => $value) {
            if (strcmp($value[0],$obs) == 0) {
                unset($this->observerlist[$key]);
            }
        }
    }

    public function notifyObserver()
    {
        foreach ($this->observerlist as $key => $value) {
            if (strcmp($value[0],"Current Score") == 0) {

                $currentcricketscore = new CurrentScoreDisplay();
                $currentcricketscore->update($this->run,$this->wicket,$this->over);
            }
            elseif (strcmp($value[0],"Average Score") == 0) {
                $averagecricketscore = new AverageScoreDisplay();
                $averagecricketscore->update($this->run,$this->wicket,$this->over);
            }
        }

    }

    private function getLatestRun()
    {
        return 90;
    }

    private function getLatestWicket()
    {
        return 2;
    }

    private function getLatestOver()
    {
        return (float) 10.2;
    }

    public function dataChanged()
    {
        $this->run = $this->getLatestRun();
        $this->wicket = $this->getLatestWicket();
        $this->over = $this->getLatestOver();

        $this->notifyObserver();
        // $this->currentcricketscore->update($this->run,$this->wicket,$this->over);
        // $this->averagecricketscore->update($this->run,$this->wicket,$this->over);
    }
}

interface Observer
{
    public function update($run,$wicket,$over);
}

class CurrentScoreDisplay implements Observer
{
    private $run;
    private $wicket;
    private $over;

    public function update($run,$wicket,$over)
    {
        $this->run = $run;
        $this->wicket = $wicket;
        $this->over = $over;
        $this->display();
    }

    public function display()
    {
        echo "------Current Score-------\n";
        echo "Score : ".$this->run."/".$this->wicket."\n";
        echo "Overs : ".$this->over."\n";
    }
}

class AverageScoreDisplay implements Observer
{
    private $runrate;
    private $predictedscore;

    public function update($run,$wicket,$over)
    {
        $this->runrate = (float) $run/$over;
        $this->predictedscore = (int) ($this->runrate * 50);
        $this->display();
    }

    public function display()
    {
        echo "-------Average Score-------\n";
        echo "RunRate : ".$this->runrate."\n";
        echo "Predicted Score : ".$this->predictedscore."\n";
    }
}

$currentcricketscore = new CurrentScoreDisplay();
$averagecricketscore = new AverageScoreDisplay();
$cricketdata = new CricketData();
$cricketdata->registerObserver("Current Score");
$cricketdata->registerObserver("Average Score");
$cricketdata->dataChanged();
$cricketdata->unregisterObserver("Average Score");
$cricketdata->dataChanged();

?>