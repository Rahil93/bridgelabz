<?php

require '../Queue/Queue.php';

class BankCounter{

    public function process()
    {
        $cashbalance = 10000;
        $transactionamount;
        $ch = 0;

        while ($ch != 3) {
            echo "1. Amount Deposition\n";
            echo "2. Amount Withdraw\n";
            echo "3. Exit\n";
            $ch;
            echo "Choose : ";
            fscanf(STDIN,"%s\n",$ch);
            switch ($ch) {
                case 1:
                    echo "Enter the amount to be transacted : ";
                    fscanf(STDIN,"%s\n",$transactionamount);
                    Queue::enqueue("Deposit");
                    $cashbalance += $transactionamount;
                    echo "Amount Deposited is $transactionamount\n";
                    echo "Total Amount is $cashbalance\n";
                    Queue::dequeue();
                    break;

                case 2:
                    if ($cashbalance > $transactionamount) {
                        echo "Enter the amount to be withdraw : ";
                        fscanf(STDIN,"%s\n",$transactionamount);
                        Queue::enqueue("Withdraw");
                        $cashbalance -= $transactionamount;
                        echo "Amount Withdraw is $transactionamount\n";
                        echo "Total Amount is $cashbalance\n";    
                    }
                    else {
                        echo "their is no sufficient amount to perform withdrawal of $transactionAmount\n";
                        echo "available balance  is $this->cashbalance\n";
                        echo "Thank you for your transaction bye bye...\n";
                        return;
                    }
                    break;

                case 3:
                    echo "Thank You...\n";
                    break;
                    
                
                default:
                    return;
                    break;
            }
        }
    }

}

BankCounter::process();

?>