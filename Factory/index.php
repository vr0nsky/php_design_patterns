<?php

abstract class Creator
{

    abstract public function factoryMethod(): Product;

    
    public function fruitProduction(): string
    {
        
        $product = $this->factoryMethod();
        
        $result = "Creator says: Let's see what we have got... " .
            $product->operation();

        return $result;
    }
}




class BananaCreator extends Creator
{
    public function factoryMethod(): Product
    {
        return new Banana();
    }
}

class OrangeCreator extends Creator
{
    public function factoryMethod(): Product
    {
        return new Orange();
    }
}


interface Product
{
    public function operation(): string;
}




class Banana implements Product
{
    

    public function operation(): string
    {
        return "Wow!! Bananas....";
    }
}

class Orange implements Product
{
    public function operation(): string
    {
        return "Hey... Oranges";
    }
}


function clientCode(Creator $creator)
{
    echo "Client says: Dunno who created this class, but it do works!!<br>"
        . $creator->fruitProduction();
}




echo "Produced by the BananaCreator.<br>";
clientCode(new BananaCreator());
echo "<br><br>";

echo "Produced by the OrangeCreator.<br>";
clientCode(new OrangeCreator());
?>