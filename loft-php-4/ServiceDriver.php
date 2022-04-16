<?php

class ServiceDriver implements iServices {

    private int $perService = 100;
    private string $serviceName = "Дополнительный водитель";

    public function add_service(iRate $rate, &$price)
    {
        $price += $this->perService;
    }

    public function getServiceName() {
        return $this->serviceName;
    }
}
