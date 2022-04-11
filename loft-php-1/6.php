<?php

echo "<table>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 10; $j++) {
        $value = $i * $j;
        echo "<td style='text-align: center; width: 40px;'>";
        if ($i % 2 == 0 && $j % 2 == 0) {
            echo "($value)";
        } elseif ($i % 2 != 0 && $j % 2 != 0) {
            echo "[$value]";
        } else {
            echo "$value";
        }
        echo "</td>";
    }
    echo "</tr>";
}



echo "</table>";
