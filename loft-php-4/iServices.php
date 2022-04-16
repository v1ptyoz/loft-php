<?php

interface iServices {
    public function add_service(iRate $rate, &$price);
    public function getServiceName();
}
