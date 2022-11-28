<?php
include_once('./FlowerAPIManager.php');

$FlowerAPIManager = new FlowerAPIManager();

$json = $FlowerAPIManager->find($_GET['id']);
echo $json;
