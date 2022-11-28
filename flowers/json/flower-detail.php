<?php

$id = $_GET['id'];

include_once('./FlowerManager.php');

use Flowers\Utilities\FlowerManager;
use Flowers\Flower;

$myflower = new FlowerManager();

$flower = $myflower->find($id);

//print_r($myflower->find($id));

echo $flower->name . "<br>";
echo $flower->get_price() . "<br><hr>";
