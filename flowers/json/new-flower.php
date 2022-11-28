<?php

use Flowers\Utilities\FlowerManager;

$name = '';
$price = '';

$errors = array();
$name = trim($_POST['name']);
$price = trim($_POST['price']);

if (empty($name))
  $errors['name'] = " Name is mandatory";

if (empty($price))
  $errors['price'] = ' Price is mandatory';


if (empty($errors)) {

  include_once('./FlowerManager.php');
  $FlowerManager = new FlowerManager();
  if ($FlowerManager->insert_flower($name, $price))

    echo '{"Succec": "Succecfully inserted"}';
  else
    echo '{"error": "problem try again later"}';
} else {

  foreach ($errors as $key => $error) {
    echo $error;
  }
}
