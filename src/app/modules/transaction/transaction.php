<?php

require_once __DIR__ . "/../account/account.php";

class Transaction {
    private Account $currentAccount;
    private Int $amountWithdrawn;
    private Int $newAccountBalance;
    private String $timestamp;

    public function __construct(Account $account) {
        $this->currentAccount = $account;
    }

    public function Process(Float $amount) {
        $currentAccountBalance = $this->currentAccount->GetAccountBalance();

        if ($amount > $currentAccountBalance) {
            return false;
        }

        $newBalance = $currentAccountBalance - $amount;
        $this->currentAccount->UpdateAccountBalance($newBalance);

        $this->amountWithdrawn = $amount;
        $this->newAccountBalance = $newBalance;
        $this->timestamp = date("Y-m-d H:i:s");

        return true;
    }

    public function GetTransactionInfo() {
        $accountType = AccountType::AccountTypeToString(
            $this->currentAccount->GetAccountType()
        );

        $info = new stdClass;
        $info->AccountNumber = $this->currentAccount->GetAccountNumber();
        $info->AccountType = $accountType;
        $info->AmountWithdrawn = $this->amountWithdrawn;
        $info->NewAccountBalance = $this->newAccountBalance;
        $info->Timestamp = $this->timestamp;

        return $info;
    }

}