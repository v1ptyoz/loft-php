<?php

const PICTURES = 80;
const BY_FELT_PENS = 23;
const BY_PENCILS = 40;

echo "На школьной выставке " . PICTURES . " рисунков \r\n";
echo BY_FELT_PENS . " из них выполнены фломастерами ";
echo BY_PENCILS . " карандашами, а остальные — красками \r\n";
echo "Сколько рисунков, выполненные красками, на школьной выставке? \r\n\r\n";

const BY_PAINTS = PICTURES - BY_FELT_PENS - BY_PENCILS;

echo "Ответ: " . BY_PAINTS . " рисунков выполнены красками";
