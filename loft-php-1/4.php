<?php

$day = mt_rand(0, 10);

switch ($day) {
    case (1):
    case (2):
    case (3):
    case (4):
    case (5):
        print("Это рабочий день");
        break;
    case (6):
    case (7):
        print("Это выходной день");
        break;
    default:
        print("Неизвестный день");
}
