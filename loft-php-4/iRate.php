<?php

interface iRate {
    public function ratePrice();
    public function addService(iServices $service);
    public function getTime();
    public function getDistance();
}
