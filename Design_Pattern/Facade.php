<?php

// Create interface Hotel 
interface Hotel
{
    public function getMenus();
}

// Create class NonVegRestaurant that implement hotel
class NonVegRestaurant  implements Hotel
{
    // method getMenus of interface Hotel is implemented here
    public function getMenus()
    {
        return $this->NonVegMenu();
    }

    public function NonVegMenu()
    {
        echo "It is a Non-Veg Menu\n";
    }
}

// Create class VegRestaurant that implement hotel
class VegRestaurant  implements Hotel
{
    // method getMenus of interface Hotel is implemented here
    public function getMenus()
    {
        return $this->VegMenu();
    }

    public function VegMenu()
    {
        echo "It is a Veg Menu\n";
    }
}

// Create class both Veg & Non-Veg Restaurant that implement hotel
class Both implements Hotel
{
    // method getMenus of interface Hotel is implemented here
    public function getMenus()
    {
        return $this->BothMenu();
    }   

    public function BothMenu()
    {
        echo "It is a Veg & Non-Veg Menu\n";
    }
}

// Create HotelFacade that interact with client & execute above class seraily
class HotelFacade
{
    // Whenever client want veg menu Facade class create VegRestaurant object & provide Veg Menu
    public function getVegMenu()
    {
        $veg = new VegRestaurant();
        return $veg->getMenus();
    }

    // Whenever client want non-veg menu Facade class create NonVegRestaurant object & provide NonVeg Menu
    public function getNonVegMenu()
    {
        $veg = new NonVegRestaurant();
        return $veg->getMenus();
    }

    // Whenever client want both veg & non-veg menu Facade class create BothRestaurant object & provide Veg & non-veg Menu
    public function getBothMenu()
    {
        $veg = new Both();
        return $veg->getMenus();
    }
}

// Create object of HotelFacade Class
$objfacade = new HotelFacade();

// It provide Veg Menu
$objfacade->getVegMenu();
// It provide Non-Veg Menu
$objfacade->getNonVegMenu();
// It provide both Veg & Non-Veg Menu
$objfacade->getBothMenu();

?>