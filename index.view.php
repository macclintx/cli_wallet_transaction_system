<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Wallet System</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .container{
            width:400px;
            background:#fff;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
            overflow:hidden;
        }

        .wallet-header{
            background:#1e88e5;
            color:white;
            padding:30px 20px;
        }

        .wallet-header h1{
            font-size:22px;
            margin-bottom:10px;
        }

        .balance{
            font-size:32px;
            font-weight:bold;
        }

        .content{
            padding:20px;
        }

        .actions{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
            margin-bottom:25px;
        }

        button{
            padding:15px;
            border:none;
            border-radius:10px;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        .deposit{
            background:#4caf50;
            color:white;
        }

        .withdraw{
            background:#e53935;
            color:white;
        }

        .history{
            background:#546e7a;
            color:white;
        }

        .exit{
            background:#212121;
            color:white;
        }

        button:hover{
            transform:translateY(-2px);
            opacity:0.9;
        }

        .transaction-section h2{
            margin-bottom:15px;
            color:#333;
        }

        .transaction-card{
            background:#f8f9fa;
            padding:15px;
            border-radius:10px;
            margin-bottom:10px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .transaction-info h4{
            color:#333;
        }

        .transaction-info p{
            color:gray;
            font-size:14px;
        }

        .amount{
            font-weight:bold;
        }

        .deposit-text{
            color:green;
        }

        .withdraw-text{
            color:red;
        }

        .form-section{
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            margin-top:10px;
        }

    </style>
</head>
<body>




    <div class="container">

        <div class="wallet-header">
            <h1>John's Wallet</h1>
            <p>Available Balance</p>
            <div class="balance">
                KES 5,000<?=$wallet['balance'];?>
            </div>
        </div>


        <div class="content">

            <form action="index.php" method="POST"></form> 
                <div class="form-section">
                    <label>Enter Amount</label>
                    <input type="number" placeholder="Enter amount">
                </div>

                <div class="actions">
                    <button name="action" value="deposit" class="deposit">
                        Deposit
                    </button>

                    <button name="action" value="withdraw" class="withdraw">
                        Withdraw
                    </button>

                    <button name="action" value="history" class="history">
                        History
                    </button>

                    <button name="action" value="exit" class="exit">
                        Exit
                    </button>
            
            </form>
        </div>

            <div class="transaction-section">

                <h2>Transaction History</h2>

                <div class="transaction-card">
                    <div class="transaction-info">
                        <h4>Deposit</h4>
                        <p>Fee: KES 0</p>
                    </div>

                    <div class="amount deposit-text">
                        +KES 500
                    </div>
                </div>

                <div class="transaction-card">
                    <div class="transaction-info">
                        <h4>Withdrawal</h4>
                        <p>Fee: KES 10</p>
                    </div>

                    <div class="amount withdraw-text">
                        -KES 500
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>