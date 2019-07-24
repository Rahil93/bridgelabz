<?php

//Create interface Itransport with abstract getTransport method  
interface Itransport
{
    public function getTransport(String $trans_medium);
}

//Create class Truck in which we inject object of class which implements interface Itransport
class Truck
{
    private $trans;

    //here we are injecting object of class which implements interface Itransport
    public function __construct(Itransport $trans)  
    {                                              
        $this->trans = $trans;
    }

    public function getTransport()
    {
        return $this->trans->getTransport("Truck");
    }
}

//Create class Ship in which we inject object of class which implements interface Itransport
class Ship
{
    private $trans;

    //here we are injecting object of class which implements interface Itransport
    public function __construct(Itransport $trans)
    {
        $this->trans = $trans;          
    }

    public function getTransport()
    {
        return $this->trans->getTransport("Ship");
    }
}

//Create Class of TransportFactory which implement Itransport
class TransportFactory implements Itransport
{
    public function TransportService(String $trans_medium,Itransport $trans)
    {
        if (strcasecmp($trans_medium,'truck') == 0) {
            return new Truck($trans);
        }
        elseif (strcasecmp($trans_medium,'ship') == 0) {
            return new Ship($trans);
        }
    }

    public function getTransport(String $trans_medium)
    {
        echo "Tranportation Done by $trans_medium\n";
    }
}

$objTransfactory = new TransportFactory();
$objTruck = $objTransfactory->TransportService("Truck",$objTransfactory);
$objTruck->getTransport();
$objShip = $objTransfactory->TransportService("Ship",$objTransfactory);
$objShip->getTransport();

?>