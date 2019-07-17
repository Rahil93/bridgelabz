<?php

// Create a class Socket that supply 120 v current
class Socket
{
    public function getVolt()
    {
        return 120;
    }
}

// Create an interface that act as an Charger that compactible with device
interface SocketAdapter
{

    public function get120Volt();
    public function get12Volt();
    public function get3Volt();

}

// Create class SocketClassAdapter that extend Socket & implement Interface Socket adapter
class SocketClassAdapter extends Socket implements SocketAdapter
{
    private function convertVolt(int $Volt,int $i)
    {
        return $Volt/$i;
    }

    public function get120Volt()
    {
        return $this->getVolt();
    }

    public function get12Volt()
    {
        $v =  $this->getVolt();
        return $this->convertVolt($v,10);
    }

    public function get3Volt()
    {
        $v = $this->getVolt();
        return $this->convertVolt($v,40);
    }
}

// Create Class Device to charge the device
class Device  
{
    private $mobvolt;

    public function __construct($volt)
    {
        $this->mobvolt = $volt;
    }
    // create a function that check that charger support the device or not
    public function charger(int $volt)
    {
        if ($volt == $this->mobvolt) {
            echo "Charging....\n";
        }
        else {
            echo "Not Charging....\n";
        }
    }
}

//create a mobile object
$mobile_volt = new Device(12);

$sock_adapter = new SocketClassAdapter();
$volt = $sock_adapter->get12Volt();

$mobile_volt->charger($volt);

?>