<?php

require 'Utility.php';
require '../../Data_Structure/Queue/Queue.php';

class Date_Time
{
    // It contain the Date & Time of the transaction in a queue
    public function track_transact()
    {
        $arr = Utility::readJson('user');
        $temp = $arr['Transaction Detail'];
        $qobj = new Queue();

        foreach ($temp as $key => $value) {
            $qobj->enqueue($key." ".$value['Date & Time of Transaction']);
        }
        $qobj->display();
    }
}

$obj = new Date_Time();
$obj->track_transact();

?>