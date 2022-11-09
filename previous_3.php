<?php



function convertor($price)
{
  $euro = 138.25;
  return $price = $euro * $price;
}



echo convertor(3);



function convertor2($price2)
{
  $jpy = 0.007;
  return $price = $price2 / $jpy;
}

echo "<br>";

echo convertor(10);
