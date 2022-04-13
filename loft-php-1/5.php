<?php

$cars = [
    "BMW" => ["model" => "X5", "speed" => 120, "doors" => 5, "year" => "2015"],
    "Toyota" => ["model" => "Corolla", "speed" => 100, "doors" => 5, "year" => "2013"],
    "Opel" => ["model" => "Astra", "speed" => 110, "doors" => 5, "year" => "2010"]
];

foreach($cars as $car => $value)
{
    echo $car . "<br>" . implode(" ", $value) . "<br><br>";
}
