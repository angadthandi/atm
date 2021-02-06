<?php

require_once __DIR__ . "/../app/modules/banknetwork/banknetwork.php";
require_once __DIR__ . "/../app/modules/bank/bank.php";
require_once __DIR__ . "/../app/modules/account/account.php";
require_once __DIR__ . "/../app/modules/card/card.php";
require_once __DIR__ . "/../app/modules/atm/atm.php";
require_once __DIR__ . "/../app/helper/helper.php";

// dealing with only 1 bank & 1 account at any time

$tmpBankID = 10;
$tmpPin = 1234;
$tmpBalance = 1000;
$account = new Account($tmpBankID, AccountType::Checking, $tmpPin, $tmpBalance);
// $info = $account->GetAccountInfo();
// $accountNumber = $account->GetAccountNumber();
$cardNumber = $account->GetCardNumber();
$pin = $account->GetPin();

$card = new Card($cardNumber, $pin);

$bank = new Bank("Test Bank");
$bank->AddAccount($account);
// $bankID = $bank->GetBankID();

$network = new BankNetwork();
$network->AddBank($bank);
$banks = $network->GetBanks();
error_log("banks:");
error_log(print_r($banks, true));
error_log(print_r($banks[0]->GetBankID(), true));

$atm = new ATM($network);

// // verify card by checking if first 2 chars meet bankID
$cardValid = $atm->VerifyCard($card);
if (!$cardValid) {
    error_log("invalid card!");
    echo "invalid card!";
    return;
}

$pinNumber = $card->GetPin();
$cardPinValid = $atm->VerifyPin($pinNumber);
if (!$cardPinValid) {
    error_log("invalid pin!");
    echo "invalid pin!";
    return;
}

$amountToWithdraw = 100;
$amountValid = $atm->AmountToWithdraw($amountToWithdraw);
if (!$amountValid) {
    error_log("not enough balance!");
    echo "not enough balance!";
    return;
}

$transactionInfo = $atm->GetTransactionInfo();
error_log("transaction processed successfully!");
error_log(print_r($transactionInfo, true));

echo "transaction processed successfully! <br>";
echo Helper::NewLineToHTMLBreak(Helper::ObjectToString($transactionInfo, true));

?>