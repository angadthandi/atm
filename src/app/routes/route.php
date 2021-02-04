<?php

require_once __DIR__ . "/iRoute.php";

class RouteController {
    private $routeType;
    private $dbConn;

    public function __construct(IRoute $route) {
        $this->routeType = $route;
    }

    public function Handle(array $data) {
        $action = (isset($data['action'])) ? $data['action'] : null;

        // if (empty($action)) {
        //     error_log('Invalid request: undefined action!');
        //     return ['error'=>'Invalid request: undefined action!'];
        // }

        return $this->routeType->Handle($data);
    }
}