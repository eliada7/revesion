<?php

namespace Flowers\Utilities;

include_once('Flower.php');

use \pdo;

class FlowerManager
{

  private function get_pdo()
  {

    return new PDO('mysql:host=localhost;dbname=flower_db', 'root', '');
  }
  public $name;
  public $price;

  public function findAll()
  {
    $pdo = $this->get_pdo();
    $query = "SELECT * FROM flowers";
    $result = $pdo->query($query);


    $flowers = $result->fetchAll(PDO::FETCH_CLASS, 'Flowers\Flower');

    $pdo = null;


    return $flowers;
  }

  public function find($id)
  {
    $pdo = $this->get_pdo();
    $id = $_GET['id'];

    $query = "SELECT * FROM flowers 
    
    WHERE id = :id";

    // prepare the query 

    $prep = $pdo->prepare($query);

    //bind the value to the placeholder 

    $prep->bindValue(':id', $id);

    // excute the query 

    $prep->execute();

    // set the fetch mode 
    $prep->setFetchMode(PDO::FETCH_CLASS, 'Flowers\Flower');

    //fetch the result 

    $flower = $prep->fetch();

    return $flower;
    $pdo = null;
  }

  public function insert_flower($name, $price)
  {
    $pdo = $this->get_pdo();
    $query = " INSERT INTO flowers (name, price) VALUES (:name,:price)";

    $prep = $pdo->prepare($query);
    $prep->bindValue(':name', $name);
    $prep->bindValue(':price', $price);
    $result = $prep->execute();
    $pdo = null;

    return $result;
  }
}
