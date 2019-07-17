<?php

// abstract computer class
abstract class Computer
{
    // abstract method that defined in a another class which extends this class
    public abstract function getRam(); 
    public abstract function getHDD();
    public abstract function getCPU();

    public function toString()
    {
        return "Ram : ".$this->getRam()." HDD : ".$this->getHDD()." CPU : ".$this->getCPU()."\n";
    }
}

// class PC extends Computer class now this class will defined all abstract method
class PC extends Computer
{
    private $RAM;
    private $HDD;
    private $CPU;

    public function __construct($RAM,$HDD,$CPU)
    {
        $this->RAM = $RAM;
        $this->HDD = $HDD;
        $this->CPU = $CPU;
    }

    public function getRam()
    {
        return $this->RAM;
    }

    public function getHDD()
    {
        return $this->HDD;
    }

    public function getCPU()
    {
        return $this->CPU;
    }
}

// class Server extends Computer class now this class will defined all abstract method
class Server extends Computer
{
    private $RAM;
    private $HDD;
    private $CPU;

    public function __construct($RAM,$HDD,$CPU)
    {
        $this->RAM = $RAM;
        $this->HDD = $HDD;
        $this->CPU = $CPU;
    }

    public function getRam()
    {
        return $this->RAM;
    }

    public function getHDD()
    {
        return $this->HDD;
    }

    public function getCPU()
    {
        return $this->CPU;
    }
}

// Computer Factory Class produce Server class & Computer Class
class ComputerFactory
{
    public static function getComputer($Type,$RAM,$HDD,$CPU)
    {
        if (strcasecmp("PC",$Type) == 0){
            return new PC($RAM,$HDD,$CPU);
        }
        elseif (strcasecmp("Server",$Type) == 0) {
            return new Server($RAM,$HDD,$CPU);
        }
        return null;
    }
}

//Creating pc & server object from Computer factory Class
$objpc = ComputerFactory::getComputer("pc","8 GB","50 TB","2.4 GHz");
$objserver = ComputerFactory::getComputer("server","16 GB","1 TB","3.2 GHz");

//Displaying PC products
echo "PC Configuration : ".$objpc->toString();
// Displaying Server Products.
echo "Server Configuration : ".$objserver->toString();

// U can access above class properties using Reflection 
$ref = new ReflectionObject($objpc);
print_r($ref->getName());
print_r($ref->getProperties());
?>