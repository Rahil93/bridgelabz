<?php

abstract class Computer
{
    public abstract function getRam();
    public abstract function getHDD();
    public abstract function getCPU();
}

class PC extends Computer
{
    private $RAM;
    private $HDD;
    private $CPU;

    public function __contruct($RAM,$HDD,$CPU)
    {
        $this->RAM = $RAM;
        $this->HDD = $HDD;
        $this->CPU = $CPU;
    }

    public function getRam()
    {
        return $this->$RAM;
    }

    public function getHDD()
    {
        return $this->$HDD;
    }

    public function getCPU()
    {
        return $this->$CPU;
    }
}

class Server extends Computer
{
    private $RAM;
    private $HDD;
    private $CPU;

    public function __contruct($RAM,$HDD,$CPU)
    {
        $this->RAM = $RAM;
        $this->HDD = $HDD;
        $this->CPU = $CPU;
    }

    public function getRam()
    {
        return $this->$RAM;
    }

    public function getHDD()
    {
        return $this->$HDD;
    }

    public function getCPU()
    {
        return $this->$CPU;
    }
}

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

$objpc = ComputerFactory::getComputer("pc","8","50","2.4");
$objserver = ComputerFactory::getComputer("server","16 GB","1 TB","3.2 GHz");

$ref = new ReflectionObject($objpc);
print_r($ref->getName());
print_r($ref->getProperties());
?>