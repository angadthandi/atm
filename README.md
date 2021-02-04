# ATM (OOD)

## Entities:

- ATM
- BankNetwork
- Bank
- Account
- Card
- Transaction

## Classes:

### ATM
- Networks BankNetwork

### BankNetwork
- Banks Bank[]

### Bank
- BankID INT

### Account
- AccountType AccountType
- AccountNumber INT

### Card
- CardNumber INT
- Pin INT

**NOTE - From CardNumber determine BankID && AccountNumber**

### Transaction
- AccountType AccountType
- CardNumber INT
- Pin INT
- Amount DOUBLE
- Timestamp DATETIME

### AccountType
- Type STRING

--------------------------------------

From src/public folder start php local server -
./../php/php.exe -S localhost:8080 -c ../php/php.ini