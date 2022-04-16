<?php

class ServiceGPS implements iServices {

    private int $perHour = 15;
    private string $serviceName = "GPS";

    public function add_service(iRate $rate, &$price)
    {
        $time = ceil($rate->getTime() / 60);

        $price += ($this->perHour * $time);
    }

    public function getServiceName()
    {
        return $this->serviceName;
    }
}
