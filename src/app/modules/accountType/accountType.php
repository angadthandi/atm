<?php

class AccountType {
    const Checking = 1;
    const Saving = 2;

    public static function AccountTypeToString(Int $accountType) {
        $accountTypeStr = '';

        switch ($accountType) {
            case self::Checking:
                $accountTypeStr = 'Checking';
            break;
            case self::Saving:
                $accountTypeStr = 'Saving';
            break;

            default:
                error_log("invalid accountType: " . $accountType);
            break;
        }

        return $accountTypeStr;
    }
}