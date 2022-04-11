<?php

$bmw["model"] = "X5";
$bmw["speed"] = 120;
$bmw["doors"] = 5;
$bmw["year"] = "2015";

$toyota["model"] = "Corolla";
$toyota["speed"] = 100;
$toyota["doors"] = 5;
$toyota["year"] = "2013";

$opel["model"] = "Astra";
$opel["speed"] = 110;
$opel["doors"] = 5;
$opel["year"] = "2010";

$cars = ["BMW" => $bmw, "Toyota" => $toyota, "Opel" => $opel];

foreach($cars as $car => $value)
{
    echo $car . "<br>" . implode(" ", $value) . "<br><br>";
}
