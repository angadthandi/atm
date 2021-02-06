<?php

require_once __DIR__ . "/../account/account.php";

class Card {
    private Int $cardNumber;
    private Int $pin;

    public function __construct(
        Int $cardNumber,
        Int $pin
    ) {
        $this->cardNumber = $cardNumber;
        $this->pin = $pin;
    }

    public function GetCardNumber() {
        return $this->cardNumber;
    }

    public function GetPin() {
        return $this->pin;
    }
}