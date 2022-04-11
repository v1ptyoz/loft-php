<?php

function task1(array $strings, bool $send_result = false)
{
    foreach ($strings as $string => $value) {
        echo "<p>$value</p>";
    }
    if ($send_result) {
        return implode($strings);
    }
}

function task2(...$args)
{
    $result = 0;
    switch ($args[0]) {
        case ("+"):
            for($i = 1; $i < sizeof($args); $i++) {
                $result += $args[$i];
            }
            echo $result;
            break;
        case ("-"):
            for($i = 1; $i < sizeof($args); $i++) {
                $result -= $args[$i];
            }
            echo $result;
            break;
        case ("*"):
            $result = 1;
            for($i = 1; $i < sizeof($args); $i++) {
                $result *= $args[$i];
            }
            echo $result;
            break;
        case ("/"):
            $result = $args[1];
            for($i = 2; $i < sizeof($args); $i++) {
                $result /= $args[$i];
            }
            echo $result;
            break;
        default:
            echo "Что-то пошло не так...";
            break;
    }
}

function task3($from, $to)
{
    if (is_int($from) && is_int($to) && $from > 0 && $to > 0) {
        echo "<table>";
        for ($i = 1; $i <= $from ; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $to; $j++) {
                echo "<td style='text-align: center; width: 40px;'>";
                echo $i * $j;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Произошла ошибка...";
    }
}

function task4()
{
    echo "<p>" . date("d.m.Y H:i") . "</p>";
    echo "<p>" . strtotime("24.02.2016 00:00:00") . "</p>";
}

function task5()
{
    $first = "Карл у Клары украл Кораллы";
    $second = "Две бутылки лимонада";

    $first = str_replace("К", "", $first);
    $second = str_replace("Две", "Три", $second);

}

function task6()
{
    file_put_contents("test.txt", "Hello again!");
    function read_file($file_name)
    {
        $result = file_get_contents($file_name);
        echo $result;
    }
}
