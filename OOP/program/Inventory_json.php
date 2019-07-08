<?php

require 'Utility.php';

// Inventory class with property
class Inventory
{
    public $name;
    public $price;
    public $weight;

    // construct function to intialize its property when ever its object is created
    public function __construct($name,$price,$weight)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        
    }
}

// Inventory Operattion class it contain method that perform on Inventory
class InventoryOperation  
{
    // It return an arr that require to store in json file
    public function arrayobj()
    {
        $name = array("Rice","Wheat","Pulses");
        $arrobj = [];
        for ($i=0; $i < sizeof($name); $i++) { 
            $price;
            echo "Enter the price of ".$name[$i]." per kg : ";
            fscanf(STDIN,"%s\n",$price);
            $weight;
            echo "Enter the weight of ".$name[$i]." : ";
            fscanf(STDIN,"%s\n",$weight);

            $arrobj[$i] = new Inventory($name[$i],$price,$weight);
        }
        return $arrobj;
    }
    
    // Display the total price of the Inventory 
    public function display($arr)
    {   
        $price = 0;
        foreach ($arr as $arrs) {
            $total = $arrs['price'] * $arrs['weight'];
            echo "Price for ".$arrs['name']." : $total\n";

            $price += $total;
        }
        echo "Total price of your Inventorty : $price\n";
    }
}

$obj = new InventoryOperation();
$file = "inventory";
$arrobj = $obj->arrayobj();
Utility::writeJson($arrobj,$file);
$arr = Utility::readJson($file);
$obj->display($arr);


?>