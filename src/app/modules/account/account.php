<?php

require_once __DIR__ . "/../accountType/accountType.php";

class Account {
    private Int $bankID;
    private Int $accountNumber;
    private Int $accountType;
    private Int $cardNumber;
    private Int $pin;
    private Float $balance;

    public static int $numOfAccounts = 9;

    public function __construct(
        Int $bankID,
        Int $accountType,
        Int $pin,
        Float $balance
    ) {
        static::$numOfAccounts++;

        $this->bankID = $bankID;
        $this->accountNumber = $this->_createAccountNumber();
        $this->accountType = $accountType;
        $this->cardNumber = $this->_createCardNumber();
        $this->pin = $pin;
        $this->balance = $balance;
    }

    public function GetAccountNumber() {
        return $this->accountNumber;
    }

    public function GetAccountType() {
        return $this->accountType;
    }

    public function GetCardNumber() {
        return $this->cardNumber;
    }

    public function GetPin() {
        return $this->pin;
    }

    public function GetAccountBalance() {
        return $this->balance;
    }

    public function UpdateAccountBalance($newBalance) {
        $this->balance = $newBalance;
    }

    private function _createAccountNumber() {
        return ($this->bankID * 10000) + static::$numOfAccounts;
    }

    private function _createCardNumber() {
        $cardNumber = ($this->accountNumber * 100000);
        if ($this->accountType == 1) {
            $cardNumber += 1;
        } else {
            $cardNumber += 2;
        }

        return $cardNumber;
    }
}