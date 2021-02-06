<?php

require_once __DIR__ . "/../account/account.php";

class Bank {
    private Int $bankID;
    private String $bankName;

    private Array $accounts; // []Account

    public static int $numOfBanks = 9;

    public function __construct(String $bankName) {
        static::$numOfBanks++;
        $this->bankID = static::$numOfBanks;
        $this->bankName = $bankName;
    }

    public function GetBankID() {
        return $this->bankID;
    }

    public function AddAccount(Account $account) {
        return $this->accounts[] = $account;
    }
}