<?php

require 'Utility.php';
require '../../Data_Structure/Stack/Stack.php';

class Stock_Symbol
{
    public function track_purchase()
    {
        $arr = Utility::readJson('user');
        $temp = $arr['Transaction Detail'];
        $stack = new Stack();
        foreach ($temp as $key => $value) {
            $stack->push($key." Share ".$value['Share']);
        }
        $stack->display();
    }
}

$obj = new Stock_Symbol();
$obj->track_purchase();

?>