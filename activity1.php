<?php

require 'vendor/autoload.php';
$faker = Faker\Factory::create('en_PH');

echo "<table>";


for ($i=1;$i<=5;$i++){

    echo "<tr>";
    echo '<td>' .$faker->name . '</td>'; 
    echo '<td>' .$faker->email . '</td>'; 
    echo '<td>' .$faker->phoneNumber . '</td>'; 
    echo '<td>' .$faker->address . '</td>'; 
    echo '<td>' .$faker->date('Y-m-d') . '</td>'; 
    echo '<td>' .$faker->title . '</td>'; 
    echo "</tr>";
}

echo "</table>"

?>