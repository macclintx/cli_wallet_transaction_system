<?php 
    
    //initial balance
    $wallet = [
        'name' => '',
        'balance' => 100
    ];
    $transactions = [];
    $Errors = [];

    function showMenu(){
        
            echo "1. Check Balance\n2. Deposit\n3. Withdraw\n4. Transaction history\n5. Exit\n\n";
   

    }

    function deposit(&$wallet, $amount, &$transaction ){
        if($amount < 5){

            return 'Minimum deposit is KES 5';

        }else{

            $wallet['balance'] += $amount;
            $transaction[] = ['type' => 'deposit', 'amount' => $amount];    
            return 'Deposit Success';
        }

    }

    function withdraw(&$wallet, $amount, &$transaction, &$Error){

        if($amount > $wallet['balance']){
         
            $Error =  ['You do not have enough money in wallet!'];
        
        }else{
            
            $wallet['balance'] -= $amount;
            $transaction[] = ['type' => 'withdrawal', 'amount' => $amount];

        }
    }

    function showTransactions($transactions){
        $counter = 1;
        foreach($transactions as $transaction){
            echo $counter++ . ". ". $transaction['type']. ", KES ". $transaction['amount']. "\n"; 
        }
        
    }

    function validateInput($input){
        if($input < 0){
            return 'Amount cannot be zero or less than zero!';
        }elseif(!ctype_digit($input)){
            return 'Amount is not a number! ';
        }else{
            return $input;
        }
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
                if ($inputValid == $depositAmount){
                    echo "\n".deposit($wallet, $inputValid, $transactions)."\n\n";
                }else{
                    echo "\n".$inputValid. "\n\n";
                };
        };
    }while($option != 5);
    

   
//echo showMenu();
