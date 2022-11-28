<?php

include_once('Flower.php');

class FlowerAPIManager
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


    $flowers = $result->fetchAll(PDO::FETCH_CLASS, 'Flower');

    $pdo = null;

    return json_encode($flowers, JSON_PRETTY_PRINT);
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
    $prep->setFetchMode(PDO::FETCH_CLASS, 'Flower');

    //fetch the result 

    $flower = $prep->fetch();


    $pdo = null;
    return json_encode($flower, JSON_PRETTY_PRINT);
  }

  public function findByName($name)
  {
    $pdo = $this->get_pdo();

    $query = "SELECT * FROM flowers 
    
    WHERE name LIKE :name";

    $prep = $pdo->prepare($query);
    $prep->bindValue(':name', "%$name%");
    $prep->execute();

    $prep->setFetchMode(PDO::FETCH_CLASS, 'Flower');
    $flowers = $prep->fetchAll();
    $pdo = null;

    return json_encode($flowers, JSON_PRETTY_PRINT);
  }

  public function sortBy($column, $direction)
  {
    $pdo = $this->get_pdo();

    $query = "SELECT * FROM flowers 
    
   ORDER BY $column $direction";

    $prep = $pdo->prepare($query);
    // $prep->bindValue(':column', $column, PDO::PARAM_STR);
    // $prep->bindValue(':direction', $direction, PDO::PARAM_INT);
    $prep->execute();

    $prep->setFetchMode(PDO::FETCH_CLASS, 'Flower');
    $flowers = $prep->fetchAll();
    $pdo = null;

    return json_encode($flowers, JSON_PRETTY_PRINT);
  }
}
