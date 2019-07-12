<?php

require 'Utility.php';

//Abtract Class with Abstract function valueOf
abstract class Stock_amount
{
    abstract function valueOf();
}

// Class Stock_account extends Stock_amount to defined abstract function
class Stock_account  extends Stock_amount
{
    public $filename;

    // Construct to intialze filename 
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    // StockAccount create new json file for every new user & take Stock detail from user
    public function StockAccount()
    {
        $account_no = rand(1,10000);
        $amount = 10000;
        $temparr = ['Account','Stock','Transaction Detail'];
        $arr[$temparr[0]] = array("Account No." => $account_no,"Amount" => $amount);
        echo "Enter Stock Detail...\n";
        $stockarr = $this->adddetail($temparr);
        $arr[$temparr[1]] = $stockarr;
        $arr[$temparr[2]] = array();
        $this->save($arr,$this->filename);
    }

    // Save a file or write a json file
    public function save($arr,$filename)
    {
        Utility::writeJson($arr,$filename);        
    }

    // User add Stock detail they have 
     
    public function adddetail()
    {
        $arr = array();
        $size;
        echo "Enter the no. of Stock u have : "; // input: 3
        fscanf(STDIN,"%s\n",$size);
        for ($i=0; $i < $size; $i++) { 
            echo "Enter Share Name : ";  // input : 1.Apple 2.Google 3.Infosys
            fscanf(STDIN,"%s\n",$arr[$i]);
        }
        $arr1 = [];
        for ($j=0; $j < $size; $j++) { 
            echo "Enter Share detail of ".$arr[$j]."\n";
            echo "Enter Number of Share : "; // input : 3 share
            $numshare;
            fscanf(STDIN,"%s\n",$numshare);
            $shareprice;
            echo "Enter each Share price : "; //share price : 500
            fscanf(STDIN,"%s\n",$shareprice);
            $arr1[$arr[$j]] = array('Number of share' => $numshare , 'Share Price' => $shareprice);
        }
        return $arr1;
        
    }

    // return amount left in his account
    public function valueOf()
    {
        $arr = Utility::readJson($this->filename);
        $total_amount = $arr['Account']['Amount'];
        return $total_amount;
    }

    // check the stock name is present or not if present send true else false
    // stock name mean share name like Google Apple etc
    public function valueCheck($temparr,$companyname)
    {
        foreach ($temparr as $key => $value) {
            if(strcmp($key,$companyname) == 0)
            {
               return true;
            }            
        }
        return false;
    }

    // whenever user buy some share this function will execute
    public function buy($amount,$companyname)
    {
        $user_arr = Utility::readJson($this->filename);
        if ($this->valueOf() >= $amount) {
            $temparr = $user_arr['Stock'];
            if (!$this->valueCheck($temparr,$companyname)) {
                $arrkey = [$companyname];
                $arrvalue[$arrkey[0]] = array('Number of share' => 1, 'Share Price' => $amount);
                $result = array_merge($temparr,$arrvalue);
                $user_arr['Stock'] = $result;
                $amt = $user_arr['Account']['Amount'] - $amount;
                $user_arr['Account']['Amount'] = $amt;
            }
            else {
                $temparr = $user_arr['Stock'];
                $num = $temparr[$companyname]['Number of share'] + 1;
                $temparr[$companyname]['Number of share'] = $num;
                $user_arr['Stock'] = $temparr;
                $amt = $user_arr['Account']['Amount'] - $amount;
                $user_arr['Account']['Amount'] = $amt;
            }
            
            Utility::writeJson($user_arr,$this->filename);
            $this->transact($companyname,'buy');

        }
        else {
            echo "You donot have efficent balance\n";
        }
    }

    // whenever user sell some share this function will execute
    public function sell($amount,$companyname)
    {
        $user_arr = Utility::readJson($this->filename);
        $temparr = $user_arr['Stock'];
        $num = $temparr[$companyname]['Number of share'] - 1;
        $temparr[$companyname]['Number of share'] = $num;
        $user_arr['Stock'] = $temparr;
        $amt = $user_arr['Account']['Amount'] + $amount;
        $user_arr['Account']['Amount'] = $amt;
        $this->save($user_arr,$this->filename);
        $this->transact($companyname,'sell');
    }

    // this function track the date & time of buy & sell share
    public function transact($companyname,$trans)
    {
        $date = date("d-m-Y h:i:sa");
        $user_arr = Utility::readJson($this->filename);
        $temparr = $user_arr['Transaction Detail'];
        $arrkey = [$companyname];
        $arr[$arrkey[0]] = ["Date & Time of Transaction" => $date, "Share" => $trans];
        $result = array_merge($temparr,$arr);
        $user_arr['Transaction Detail'] = $result;
        Utility::writeJson($user_arr,$this->filename);
    }

    // It print the account detail of user
    public function print()
    {
        echo "------------Account Detail---------------\n";
        $user_arr = Utility::readJson($this->filename);
        echo "Your Account Balance : ".$this->valueOf()."\n";
        $temparr = $user_arr['Stock'];
        foreach ($temparr as $key => $value) {
            echo "Name of Share : ".$key."\n";
            echo "Share price : ".$value['Share Price']."\n";
            echo "Number of share : ".$value['Number of share']."\n";
        }
    }
}

$file;
echo "Enter File Name : ";
fscanf(STDIN,"%s\n",$file);
$obj = new Stock_account($file);
$file = $obj->StockAccount();
$obj->print();
$obj->buy(500,'Google');
$obj->buy(100,'Infosys');
$obj->sell(800,'Apple');
$obj->buy(600,'Microsoft');
$obj->print();

?>