<?php

require_once __DIR__ . "/../banknetwork/banknetwork.php";
require_once __DIR__ . "/../card/card.php";
require_once __DIR__ . "/../transaction/transaction.php";

class ATM {
    private BankNetwork $network;
    private Account $currentAccount;
    private Transaction $currentTransaction;

    public function __construct(BankNetwork $network) {
        $this->network = $network;
    }

    public function VerifyCard(Card $card) {
        $banks = $this->network->GetBanks();

        foreach($banks as $bank) {
            $accounts = $bank->GetAccounts();

            foreach($accounts as $account) {
                if ($account->GetCardNumber() == $card->GetCardNumber()) {
                    $this->currentAccount = $account;

                    return true;
                }
            }
        }

        return false;
    }

    public function VerifyPin(Int $pin) {
        if ($pin == $this->currentAccount->GetPin()) {
            return true;
        }

        return false;
    }

    public function AmountToWithdraw(Float $amount) {
        $this->currentTransaction = new Transaction($this->currentAccount);
        return $this->currentTransaction->Process($amount);
    }

    public function GetTransactionInfo() {
        return $this->currentTransaction->GetTransactionInfo();
    }

}