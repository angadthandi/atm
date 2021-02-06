<?php

require_once __DIR__ . "/../account/account.php";

class Card {
    private Account $account;
    private Int $cardNumber;
    private Int $pin;

    public function __construct(Account $account) {
        $this->account = $account;
    }

    public function GetCardNumber() {
        return $this->cardNumber;
    }

    public function GetPin() {
        return $this->pin;
    }

    private function _createCard() {
        $this->cardNumber = ($account->GetAccountNumber() * 10000);
        if ($account->GetAccountType() == 1) {
            $this->cardNumber += 1;
        } else {
            $this->cardNumber += 2;
        }

        $this->pin = $account->GetAccountPin();
    }
}