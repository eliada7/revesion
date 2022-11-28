<?php
include_once('./FlowerAPIManager.php');

$FlowerAPIManager = new FlowerAPIManager();

$json = $FlowerAPIManager->findAll();



if (isset($_GET['name']))

  $json = $FlowerAPIManager->find($_GET['name']);

else if (isset($_GET['column']) && isset($_GET['direction']))

  $json = $FlowerAPIManager->sortBy($_GET['column'], $_GET['direction']);
else

  $json = $FlowerAPIManager->findAll();


echo "<pre>";
echo $json;
echo "</pre>";
