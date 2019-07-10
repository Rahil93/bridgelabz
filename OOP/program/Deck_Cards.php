<?php

class Deck_Cards
{
    public $suit = ["Clubs","Diamonds","Hearts","Spades"];
    public $rank = ["2","3","4","5","6","7","8","9","10","Jack","Queen","King","Ace"];

    // Create the sets of a card
    public function card()
    {
        $cards = [];
        $k = 0;
        $l = 0;
        for ($i=0; $i < sizeof($this->suit); $i++) { 
            for ($j=0; $j < sizeof($this->rank); $j++) { 
                $cards[$i][$j] = $this->suit[$i]." of ".$this->rank[$j];
            }
        }
        return $cards;
    }

    // Shuffle the card & store in 2D array
    public function shuffle($arr)
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 9; $j++) { 
                $rand_row = rand(0,3);
                $rand_column = rand(0,12);
                $distrubte[$i][$j] = $arr[$rand_row][$rand_column];
            }
        }
        $this->print($distrubte);
    }

    // Print the card distribute to the players
    public function print($arr)
    {
        for ($i=0; $i < 4; $i++) { 
            echo "-------Palyer ".($i + 1)." cards-------\n";
            for ($j=0; $j < 9; $j++) { 
                echo $arr[$i][$j]."\n";            
            }
        }
    }
}

$obj = new Deck_Cards();
$arr = $obj->card();
var_dump($arr);
$obj->shuffle($arr);


?>