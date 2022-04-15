<?php

include "./api/db.php";
echo "<pre>";
$db = api::getInstance();

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$street = $_REQUEST["street"];
$home = $_REQUEST["home"];
$part = $_REQUEST["part"] ?? "";
$appt = $_REQUEST["appt"] ?? "";
$floor = $_REQUEST["floor"] ?? "";
$comment = $_REQUEST["comment"];

$address = $street . " " . $home . " " . $part . " " . $appt . " " . $floor;

$order = $db->placeOrder($email, $name, $phone, $address, $comment);

echo "Спасибо, ваш заказ будет доставлен по адресу: $address" .  "<br>";
echo "Номер вашего заказа: " . $order["order_id"]  .  "<br>";
echo "Это ваш " . $order["orders_counter"] . "-й заказ!";
