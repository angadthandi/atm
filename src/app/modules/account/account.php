<?php

require_once __DIR__ . "/../accountType/accountType.php";

class Account {
    private Int $accountNumber;
    private Int $accountType;
    private Int $accountPin;
    private Float $balance;

    public function __construct(
        Int $accountNumber,
        Int $accountType,
        Int $accountPin,
        Float $balance
    ) {
        $this->accountNumber = $accountNumber;
        $this->accountType = $accountType;
        $this->accountPin = $accountPin;
        $this->balance = $balance;
    }

    public function GetAccountNumber() {
        return $this->accountNumber;
    }

    public function GetAccountType() {
        return $this->accountType;
    }

    public function GetAccountPin() {
        return $this->accountPin;
    }

    public function GetAccountBalance() {
        return $this->balance;
    }

    public function UpdateAccountBalance($newBalance) {
        $this->balance = $newBalance;
    }
}