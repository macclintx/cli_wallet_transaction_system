<?php 
    define('TRANSACTION_FEE_ON_WITHDRAW', 0.02); //decimal percentage(2/100)

    //initial balance
    $wallet = [
        'name' => 'User Error',
        'balance' => 100
    ];

    $transactions = [];

    function showMenu(){
        
            echo "1. Check Balance\n2. Deposit\n3. Withdraw\n4. Transaction history\n5. Exit\n\n";
   

    }

    function deposit(&$wallet, $amount, &$transaction ){
        if($amount < 5){

            return 'Minimum deposit is KES 5';

        }else{

            $wallet['balance'] += $amount;
            $transaction[] = ['type' => 'deposit', 'amount' => $amount, 'fee' => null];    
            return 'Deposit Success';
        }

    }

    function withdraw(&$wallet, $amount, &$transaction){

        if($amount > $wallet['balance']){
         
            return 'You do not have enough money in wallet!';
        
        }
        else{
            //withdraw fee feature
            $transactionFee = transactionFeeOnWithdraw($amount, TRANSACTION_FEE_ON_WITHDRAW);
            $totalWithdrawal = $amount + $transactionFee;

            if( $totalWithdrawal > $wallet['balance']){
                return "You do not have enough balance to withdraw and pay transaction fee!";
            }

            $wallet['balance'] -= ($amount + $transactionFee);
            $transaction[] = ['type' => 'withdrawal', 'amount' => $amount, 'fee' => $transactionFee];


            return 'Withdraw Success';
        }
    }

    function showTransactions($transactions){
        $counter = 1;
        
        echo "No\tType\t\t\tAmount\t\t\tFee\n";
        foreach($transactions as $transaction){
            echo $counter++ . ".\t". $transaction['type']. "\t\t\tKES ". $transaction['amount']. "\t\tKES ", $transaction['fee'].  "\n"; 
        }
        
    }

    function validateInput($input){
        if($input <= 0 ){
            return 'Amount cannot be zero or less than zero!';
        }elseif(!ctype_digit($input)){
            return 'Amount is not a number! ';
        }else{
            return $input;
        }
    }

    function transactionFeeOnWithdraw($amount, $fee){
        return $amount * $fee;
    }


    do{

        showMenu();
        $option = readline("Enter option: ");

        switch($option){
            case 1:
                echo $wallet['balance'] . "\n";
                break;
            case 2: 
                $depositAmount = readline("Enter amount to deposit(KES): ");
                $inputValid = validateInput($depositAmount);
                if ($inputValid === $depositAmount){
                    echo "\n".deposit($wallet, $inputValid, $transactions)."\n\n";
                }else{
                    echo "\n".$inputValid. "\n\n";
                };
                break;
            
            case 3:
                $withdrawAmount = readline("Enter amount to withdraw(KES): ");
                $inputValid = validateInput($withdrawAmount);

                if($inputValid === $withdrawAmount){
                    echo "\n" . withdraw($wallet, $inputValid, $transactions). "\n\n";
                }else{
                    echo "\n" . $inputValid. "\n\n";
                }
                break;

            case 4:

                echo "\n";
                if(empty(showTransactions($transactions))){
                    echo "No transaction(s) found!";
                }
                echo "\n\n";
                break;

            case 5:
                
                echo "\n\n==== Exiting ====\n\n";
                break;

            default:
                echo "\n\nInvalid input!\n\n";
                break;    
        };
    }while($option != 5);

