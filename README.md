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
- BankName STRING

### Account
- BankID INT
- AccountNumber INT
- AccountType AccountType
- CardNumber INT
- Pin INT
- Balance FLOAT

### Card
- CardNumber INT
- Pin INT

### Transaction
- Account Account
- CardNumber INT
- Pin INT
- Amount FLOAT
- Timestamp DATETIME

### AccountType
- Type STRING

--------------------------------------

From src/public folder start php local server -
./../php/php.exe -S localhost:8080 -c ../php/php.ini

--------------------------------------

### Test ATM Flow:
#### Setup
- Create Account
- Create Card for Account
- Create Bank
- Add Account to Bank
- Create Bank Network
- Add Bank to Bank Network
#### Process Transaction
- Initialize ATM with Bank Network
- Verify Card with Bank
- Verify Card Pin
- Detect Account to Process
- Withdraw Amount from Account
- Return Transaction Details