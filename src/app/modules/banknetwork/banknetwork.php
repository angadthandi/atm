<?php

require_once __DIR__ . "/../bank/bank.php";

class BankNetwork {
    private Array $banks; // []Bank

    public function __construct() {}

    public function AddBank(Bank $bank) {
        $this->banks[] = $bank;
    }

    public function GetBanks() {
        return $this->banks;
    }
}