<?php

require_once __DIR__ . "/../app/modules/banknetwork/banknetwork.php";
require_once __DIR__ . "/../app/modules/bank/bank.php";
require_once __DIR__ . "/../app/modules/account/account.php";
require_once __DIR__ . "/../app/modules/card/card.php";

// dealing with only 1 bank & 1 account at any time

$tmpBankID = 10;
$tmpPin = 1234;
$tmpBalance = 1000;
$account = new Account($tmpBankID, AccountType::Checking, $tmpPin, $tmpBalance);
// $info = $account->GetAccountInfo();
// $accountNumber = $account->GetAccountNumber();
// $pin = $account->GetPin();

$card = new Card($account);

$bank = new Bank("Test Bank");
$bank->AddAccount($account);
// $bankID = $bank->GetBankID();

$network = new BankNetwork();
$network->AddBank($bank);
$banks = $network->GetBanks();
error_log("banks:");
error_log(print_r($banks, true));
error_log(print_r($banks[0]->GetBankID(), true));

// $atm = new ATM($network);

// // verify card by checking if first 2 chars meet bankID
// $cardNumber = $card->GetCardNumber();
// $cardValid = $atm->VerifyCardNumber($cardNumber);
// if (!$cardValid) {
//     error_log("invalid card!");
// }

// $pinNumber = $card->GetPin();
// $cardPinValid = $atm->VerifyPin($pinNumber);
// if (!$cardPinValid) {
//     error_log("invalid pin!");
// }

// $amountToWithdraw = 100;
// $atm->AmountToWithdraw($amountToWithdraw);

// $atm->GetTransactionInfo();

// // $accountForTransaction = $atm->GetAccount();

// // $withdrawalAmount = 1000;
// // $transaction = new Transaction(
// //     $accountForTransaction,
// //     $cardNumber,
// //     $pinNumber,
// //     $withdrawalAmount
// // );
// // $processed = $transaction->run();
// // if (!$cardPinValid) {
// //     error_log("failed transaction!");
// // }
// // error_log("transaction processed successfully!");

// // $updatedInfo = $account->GetAccountInfo();
// // error_log("updated account info:");
// // error_log(print_r($updatedInfo, true));

?>