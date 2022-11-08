<?php

echo '<h3>Exercise 1</h3>';

$x = 5;
echo gettype($x) . "<br>";

$y = "1";
echo gettype($y) . "<br>";

$z = true;
echo gettype($z) . "<br>";

$n = 2.5;
echo gettype($n) . "<br>";

$z = $x + $y;
echo gettype($z) . "<br>";

$k = $n * $y;
echo gettype($k) . "<br>";


function check($var){

    echo "the type is :".gettype($var)."<br>";
    echo "the value is :".$var."<br>";

}

echo check('hello');

?>


<?php

/*
	Show the date (in a nice format) for :
		- Today
		- Tomorrow
		- The same date than today one month later
*/

echo '<hr>';
echo '<h3>Exercise 2</h3>';

echo "today is ". date("Y-M-D :h:i:sa");
 echo "<br>";
 echo "<br>";
 
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("-1 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>


<?php

/*
	Create an array with the numbers from 1 to 100 : Create it dynamically using a loop.
	Once it has been created, display it in a HTML list (ul/li)
	Use one loop to create the array.
	Use a second loop to display it.
*/
echo '<hr>';
echo '<h3>Exercise 3</h3>';


$nbs = [];

for($x =1; $x <= 100; $x++){
  


 echo  $nbs[] = $x;


}


echo "<ul>";
for ($i = 1; $i <= 100; $i++){

    echo "<li>$i</li>";
    
}
echo "</ul>";

?>


<?php

// SELECT movies.* , directors.first_name
// FROM movies
// INNER JOIN directors
// ON directors.id = movies.director_id
// WHERE directors.first_name = 'George' AND directors.last_name = "Lucas"

$conn = mysqli_connect("localhost","root","","movie_db");

$query = "SELECT movies.* , directors.*
FROM movies
INNER JOIN directors
ON directors.id = movies.director_id";

$result = mysqli_query($conn, $query);

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

 <table border ="1p">
 <tr>
 <th>title</th>
 <th>the director</th>
  <th>release_date</th>
  <th>Descriptions</th>
</tr>
<?php foreach($movies as $movie): ?>

<tr>
<td><?= $movie['title']?></td>
<td><?= $movie['first_name']?></td>
<td><?= $movie['release_date']?></td>
<td><?= $movie['description']?></td>
</tr>;



    <!-- echo $movie['title'];
    echo "<br>";
    echo $movie['release_date']; -->
<?php endforeach;?>

</table>


<?php

/*
    -- Exercise 1 :
    
    Thanks to that array : 
    $array = array(
        'lastname' => 'simon',
        'firstname' => 'simon',
        'phone' => '+3526455748'
        'mail' => 'simon@simon.fr',
        'address' => '6 rue de la gare',
        'city' => 'Mondelange'
    );
    Using a loop, display the content of this array (keys and values)
*/

$info = array(
    'lastname' => 'simon',
    'firstname' => 'simon',
    'phone' => '+3526455748',
    'mail' => 'simon@simon.fr',
    'address' => '6 rue de la gare',
    'city' => 'Mondelange'
);


foreach($info as $key => $value){

echo $key. " : ".$value."<br>";


}



?>


<?php
/*
	-- Exercise 2 :
	Write a function that:
	    - Takes two arguments as numbers.
		- Function should make sure the arguments are numbers
	    - Check which is the largest number.
		- RETURN the message (don't echo inside the function)
	The expected result is this:
		If one of the arguments is not a number, display : 
			'Expecting numbers !!!';
		Else : 
		    The first number is larger (if the first number is larger than the second number)
	    	The first number is smaller (if the first number is smaller than the second number)
		    The two numbers are identical (if the two numbers are equal)
*/

function ckeckNbs($x,$y){

if(is_numeric($x) AND is_numeric($y)){

   if($x > $y){
    echo "the first number is " .$x. " bigger than the second number ".$y;
   }elseif($x < $y){
    echo "the first number is " .$x. " smaller than the second number ".$y;
   }else{
    echo "The two numbers are identical";
   }

}else{

    echo "Expecting numbers !!!";
}

}

echo  ckeckNbs(1,1);


?>

<?php

// SELECT  * FROM `instruments` WHERE  type = "guitars" AND `price` < 20





?>
