<?php

class PerHourRate extends Rate
{
    protected int $per_km = 0;
    protected int $per_minute = 200;
    protected string $rateName = "Тариф почасовой";

    public function __construct($distance, $minutes)
    {
        $this->hours = ceil($minutes / 60);
        parent::__construct($distance, $minutes);
    }

}
