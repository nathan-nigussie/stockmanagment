<?php
include_once "../core/DbHandler.class.php";
include_once "../config/constants.php";
include_once "../controller/post.php";

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($sku, $name, $price, $type)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getType()
    {
        return $this->type;
    }
    abstract public function saveToDatabase(DbHandler $dbHandler);

}
