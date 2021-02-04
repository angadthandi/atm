<?php

interface IRoute {
    public static function Type();
    public function Handle(array $data);
}