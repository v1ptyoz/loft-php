<?php

class BaseRate extends Rate
{
    protected int $per_km = 10;
    protected int $per_minute = 3;
    protected string $rateName = "Тариф базовый";
}
