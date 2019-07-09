<?php

require 'Utility.php';

class Stock
{
    // Calculate & display the stock report
    public function display_report($arr)
    {
        $result = 0;
        foreach ($arr as $key => $value) {
            foreach ($value as $key => $val) {
                echo "Stock Name : ".$key."\n";
                echo "Number of Share : ".$value[$key][0]['Number of share']."\n";
                echo "Share Price : ".$value[$key][0]['Share Price']."\n";
                $result += $value[$key][0]['Share Price'];
            }
        }
        echo "Total value of Stock : $result\n";
    }
}

// Read the json file & convert into the readable format;
$arr = Utility::readJson("stock");
$obj = new Stock();
$obj->display_report($arr);




?>