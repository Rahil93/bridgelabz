<?php

require 'Utility.php';

class Stock
{
    // It return an arr that require to store in json file
    public function arrobj()
    {
        $arr = array();
        $size;
        echo "Enter the no. of Stock u want : ";
        fscanf(STDIN,"%s\n",$size);
        for ($i=0; $i < $size; $i++) { 
            echo "Enter Stock Name : ";
            fscanf(STDIN,"%s\n",$arr[$i]);
        }
        $arr1 = [];
        for ($j=0; $j < $size; $j++) { 
            echo "Enter Number of Share : ";
            $numshare;
            fscanf(STDIN,"%s\n",$numshare);
            $shareprice;
            echo "Enter Share price : ";
            fscanf(STDIN,"%s\n",$shareprice);
            $arr1[$arr[$j]] = array('Number of share' => $numshare , 'Share Price' => $shareprice);
        }
        return $arr1;
    }

    // Calculate & display the stock report
    public function display_report($arr)
    {
        $result = 0;
        foreach ($arr as $key => $value) {
            echo "Stock Name : ".$key."\n";
            echo "Number of Share : ".$value['Number of share']."\n";
            echo "Share Price : ".$value['Share Price']."\n";
            $result += $value['Share Price'];
        }
        echo "Total value of Stock : $result\n";
    }
}

$obj = new Stock();
$arr = $obj->arrobj();
$file = 'stock';

// Read an arr created by user & location of file where that arr is encoded to json file
Utility::writeJson($arr,$file);

// Read the json file & convert into the readable format;
$arr1 = Utility::readJson($file);
$obj->display_report($arr1);

?>