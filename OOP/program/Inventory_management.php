<?php

require 'Utility.php';

class Inventory_Management
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
            echo "Enter the no. of $arr[$j] device you want to add : ";
            $num;
            fscanf(STDIN,"%s\n",$num); 
            for ($k=0; $k < $num; $k++) { 
                echo "Enter $arr[$j] Name : ";
                $name;
                fscanf(STDIN,"%s\n",$name);
                $price;
                echo "Enter price : ";
                fscanf(STDIN,"%s\n",$price);
                $arr1[$arr[$j]][$k] = array('Name' => $name , 'Price' => $price);                
            }
        }
        return $arr1;
    }

    public function display($arr)
    {
        $result = 0;
        echo "----------------------------";
        foreach ($arr as $key => $value) {
            echo "Stock Name : ".$key."\n";
            for ($i=0; $i < sizeof($value); $i++) { 
                echo "$key Name : ".$value[$i]['Name']."\n";
                echo "Price : ".$value[$i]['Price']."\n";
                $result += $value[$i]['Price'];
            }
        }
        echo "Total value of Stock : $result\n";
    }
}

$obj = new Inventory_Management();
// var_dump($obj->arrobj());
$arr = $obj->arrobj();
$file = 'inventory_management';

// Read an arr created by user & location of file where that arr is encoded to json file
Utility::writeJson($arr,$file);

// Read the json file & convert into the readable format;
$arr1 = Utility::readJson($file);
$obj->display($arr);
?>