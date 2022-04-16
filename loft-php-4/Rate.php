<?php

abstract class Rate implements iRate
{
    protected int $per_km;
    protected int $per_minute;
    protected int $distance;
    protected int $minutes;
    protected int $hours = 0;
    protected string $rateName = "";

    /** @var iServices[] */
    protected array $services = [];

    public function __construct($distance, $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
    }

    public function ratePrice()
    {
        $output = [];
        $services = [];
        $hours = ceil($this->minutes / 60);

        if ($this->hours > 0) {
            $ratePrice = $this->distance * $this->per_km + $this->hours * $this->per_minute;
        } else {
            $ratePrice = $this->distance * $this->per_km + $this->minutes * $this->per_minute;
        }

        foreach ($this->services as $service) {
            $service->add_service($this, $ratePrice);
            array_push($services, $service->getServiceName());
        }

        array_push($output, $this->rateName);

        array_push($output, "($this->distance км, $hours час)<br>");

        foreach ($services as $service) {
            array_push($output, "  - добавить услугу $service<br><br>");
        }

        array_push($output, "$ratePrice рублей<br>");

        return implode("", $output);
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getTime()
    {
        return $this->minutes;
    }

    public function addService(iServices $service)
    {
        array_push($this->services, $service);
    }
}
