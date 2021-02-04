<?php

require_once __DIR__ . "/iRoute.php";

class GetController implements IRoute {

    public function __construct() {}

    public static function Type() {
        return 'GET';
    }

    public function Handle(array $data) {
        $ret = [];
        $action = $data['action'];

        switch ($action) {

            default:
                error_log('Invalid action: ' . $action);
                $ret = ['error'=>'Invalid action: ' . $action];
        }

        return $ret;
    }
}