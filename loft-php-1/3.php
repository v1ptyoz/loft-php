<?php

$age = mt_rand(0, 100);

if ($age >= 18 && $age <= 65) {
    print("Вам еще работать и работать");
} else if ($age > 65) {
    print("Вам пора на пенсию");
} else if ($age <= 17 && $age >= 1) {
    print("Вам ещё рано работать");
} else {
    print("Неизвестный возраст");
}
