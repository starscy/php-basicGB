<?php
require_once './User.php';

class Product 
{
    private string $title;
    private float $price;
    private array $components;

    function __construct (string $title, string $price, ?array $components = [])
    {
       $this->title = $title;
       $this->price = $price;
       $this->components = $components; 
    }

    function getTitle ()  : string
    {
       return  $this -> title;
    }

    function getPrice ()  : int
    {
       return  $this -> price;
    }

    function getComponets () : array
    {
        return $this -> components;
    }

    function setPrice ($price)  : void
    {
       $this -> price = $price;
    }

}

class Cart 
{
    private User $owner;
    private  $products;
    private ?int $price;

    function __construct (User $owner)
    {
        $this -> owner = $owner;
        $this -> products=[];
    }
    
    function showProducts ()  : array
    {
       return  $this -> products;
    }

    function addProduct (Product $item) : void
    {
        array_push($this -> products , $item);
    }

    function deleteProduct (Product $product) : void
    {
        foreach($this-> products as $key => $item){
            if ($item -> title === $product -> title){
              unset($this-> products[$key]);
            }
        }
    }

    function countSumBasket ()
    {
        $basketSum = 0;
        foreach($this -> products as $key => $item){
            if($item -> getComponets ()) {
                $components = array_sum($item ->  getComponets ());

                $item-> setPrice($item -> getPrice() + $components);
                // $item -> price += $components;
            }
            $basketSum += $item -> getPrice ();
        }
        return $basketSum;
    }

}

$user = new User ('Vadim','email');

$components = [
    'mouse' => 2000,
    'keyboard' => 3000,
    'soundbar' => 5000,
];

$computer = new Product('computer', 10000);
$computerMax = new Product('PRO - computer' , 20000 , $components);
$mouse = new Product('2 mouses',1000,[$components['mouse']]);

$cart = new Cart($user);

$cart-> addProduct($computer);
$cart-> addProduct($computerMax);
$cart-> addProduct($mouse);

// $cart-> deleteProduct($computerMax); 
// $cart-> deleteProduct($computer); 

echo $cart-> countSumBasket();

//  print_r($cart->showProducts());


