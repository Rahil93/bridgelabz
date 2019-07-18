<?php

interface ItemElement
{
    public function accept(ShoppingCartVisitor $visitor);
}

class Book implements ItemElement
{
    private $price;
    private $isbn_number;

    public function __construct($price,$isbn_number)
    {
        $this->price = $price;
        $this->isbn_number = $isbn_number;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getISBN_num()
    {
        return $this->isbn_number;
    }

    public function accept(ShoppingCartVisitor $visitor)
    {
        return $visitor->visitBook($this);
    }
}

class Fruit implements ItemElement
{
    private $pricePerKg;
    private $weight;
    private $name;

    public function __construct($pricePerKg,$weight,$name)
    {
        $this->pricePerKg = $pricePerKg;
        $this->weight = $weight;
        $this->name = $name;
    }

    public function getPricePerKg()
    {
        return $this->pricePerKg;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getName()
    {
        return $this->name;
    }

    public function accept(ShoppingCartVisitor $visitor)
    {
        return $visitor->visitFruit($this);
    }
}

interface ShoppingCartVisitor
{
    function visitBook(Book $book);
    function visitFruit(Fruit $fruit);
}

class ShoppingCartVisitorImpl implements ShoppingCartVisitor
{
    public function visitBook(Book $book)
    {
        $cost = $book->getPrice();
        echo "Book ISBN Number : ".$book->getISBN_num()."\nCost : ".$cost."\n";
        return $cost;
    }

    public function visitFruit(Fruit $fruit)
    {
        $cost = $fruit->getPricePerKg() * $fruit->getWeight();
        echo "Fruit Name : ".$fruit->getName()."\nCost : ".$cost."\n";
        return $cost;
    }
}
$b1 = new Book(45,6568);
$b2 = new Book(50,4758);
$f1 = new Fruit(50,3,"Mango");
$f2 = new Fruit(30,2,"Banana");
$visitor = new ShoppingCartVisitorImpl();
$item = array($b1->accept($visitor),$b2->accept($visitor),$f1->accept($visitor),$f2->accept($visitor));
// var_dump($item);
$total = calculatePrice($item);
echo "Total Cost : ".$total."\n";

function calculatePrice($item)
{
    $objShoppingCart = new ShoppingCartVisitorImpl();
    $sum = 0;
    foreach ($item as $key => $value) {
        $sum = $sum + $value;
    }
    return $sum;
}


?>