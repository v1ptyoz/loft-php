<?php

function task1()
{
    $users = [];
    $names = ["Sasha", "Vasya", "Sergey", "Maksim", "Roman"];
    for ($i = 0; $i < 50; $i++) {
        array_push($users, [
            "id" => $i + 1,
            "name" => $names[random_int(0, 4)],
            "age" => random_int(18, 45)
        ]);
    }

    file_put_contents("users.json", json_encode($users));

    $users_from_json = json_decode(file_get_contents("users.json"), true);

    $names_counter = [];

    $total_age = 0;

    foreach ($users_from_json as $user) {
        if (isset($names_counter[$user["name"]])) {
            $names_counter[$user["name"]] = $names_counter[$user["name"]] + 1;
        } else {
            $names_counter[$user["name"]] = 0;
        }
        $total_age = $total_age + $user["age"];
    }

    foreach($names_counter as $name => $value)
    {
        echo $name . " = " . $value . "<br>";
    }

    echo "Средний возраст - " . $total_age / sizeof($users_from_json) . " лет";


}

function task2() {}

function task3() {}
