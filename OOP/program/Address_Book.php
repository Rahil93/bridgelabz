<?php

require 'Utility.php';

class Address_Book
{
    
    public $firstname;
    public $lastname;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone_num;
    
    public function init_new_account()
    {
        echo "Enter your first name : ";
        fscanf(STDIN,"%s\n",$this->firstname);
        echo "Enter your last name : ";
        fscanf(STDIN,"%s\n",$this->lastname);
        echo "Enter your address : ";
        fscanf(STDIN,"%s\n",$this->address);
        echo "Enter your city : ";
        fscanf(STDIN,"%s\n",$this->city);
        echo "Enter your state : ";
        fscanf(STDIN,"%s\n",$this->state);
        echo "Enter your city zipcode : ";
        fscanf(STDIN,"%s\n",$this->zipcode);
        echo "Enter your phone number : ";
        fscanf(STDIN,"%s\n",$this->phone_num);
        $this->create_account();
    }

    public function create_account()
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        $acc_detail["$this->firstname $this->lastname"] = array("First Name" => $this->firstname,"Last Name" => $this->lastname,"Address" => $this->address,"City" => $this->city,"State" => $this->state,"Zipcode" => $this->zipcode,"Phone Number" => $this->phone_num);
        $result = array_merge($temparr,$acc_detail);
        $arr['Address Book Detail'] = $result;
        Utility::writeJson($arr,'address_book');
        
    }

    public function edit_exist_user()
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        $fname;
        echo "Enter first name : ";
        fscanf(STDIN,"%s\n",$fname);
        $lname;
        echo "Enter last name : ";
        fscanf(STDIN,"%s\n",$lname);
        $fullname = ucwords($fname." ".$lname);
        if ($this->search_key($fullname)) {
            echo "Enter your address : ";
            fscanf(STDIN,"%s\n",$this->address);
            echo "Enter your city : ";
            fscanf(STDIN,"%s\n",$this->city);
            echo "Enter your state : ";
            fscanf(STDIN,"%s\n",$this->state);
            echo "Enter your city zipcode : ";
            fscanf(STDIN,"%s\n",$this->zipcode);
            echo "Enter your phone number : ";
            fscanf(STDIN,"%s\n",$this->phone_num);
            $arr = Utility::readJson('address_book');
            $temparr = $arr['Address Book Detail'];
            $acc_detail["$fullname"] = array("First Name" => $fname,"Last Name" => $lname,"Address" => $this->address,"City" => $this->city,"State" => $this->state,"Zipcode" => $this->zipcode,"Phone Number" => $this->phone_num);
            $result = array_merge($temparr,$acc_detail);
            $arr['Address Book Detail'] = $result;
            Utility::writeJson($arr,'address_book');
        }
        else {
            echo "$fullname doesnot exist in a list\n";
        }
    }

    public function delete_user()
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        $fname;
        echo "Enter first name : ";
        fscanf(STDIN,"%s\n",$fname);
        $lname;
        echo "Enter last name : ";
        fscanf(STDIN,"%s\n",$lname);
        $fullname = ucwords($fname." ".$lname);
        if ($this->search_key($fullname)) {
            unset($temparr[$fullname]);
            $arr['Address Book Detail'] = $temparr;
            Utility::writeJson($arr,'address_book');
        }
        else {
            echo "$fullname doesnot exist in a list\n";
        }
    }

    public function search_key($fullname)
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        foreach ($temparr as $key => $value) {
            if(strcmp($key,$fullname) == 0)
            {
               return true;
            }            
        }
        return false;
    }

    public function sort($cond)
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        $keyarr = [];
        $vallname = [];
        $valzip = [];
        $i = 0;
        foreach ($temparr as $key => $value) {
            $keyarr[$i] = $key;
            $vallname[$i] = $value['Last Name'];
            $valzip[$i] = $value['Zipcode']; 
            $i++;
        }
        
        if ($cond == 'lastname') {
            for ($i=0; $i < sizeof($vallname) - 1; $i++) { 
                for ($j=0; $j < sizeof($vallname) - 1 - $i; $j++) { 
                    if (strcmp($vallname[$j],$vallname[$j + 1]) == 1) {
                        $templname = $vallname[$j];
                        $vallname[$j] = $vallname[$j + 1];
                        $vallname[$j + 1] = $templname;
                        $temp = $keyarr[$j];
                        $keyarr[$j] = $keyarr[$j + 1];
                        $keyarr[$j + 1] = $temp;
                    }
                }
            }

            for ($i=0; $i < sizeof($keyarr); $i++) { 
                $arr5[$keyarr[$i]] = $temparr[$keyarr[$i]];
            }
            $arr['Address Book Detail'] = $arr5;
            Utility::writeJson($arr,'address_book');
        }
        else if($cond == 'zipcode'){
            $n = sizeof($valzip) - 1;
            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $n; $j++) { 
                    if (strcmp($valzip[$j], $valzip[$j + 1]) == 1) {
                        $tempzip = $valzip[$j];
                        $valzip[$j] = $valzip[$j + 1];
                        $valzip[$j + 1] = $tempzip;
                        $temp = $keyarr[$j];
                        $keyarr[$j] = $keyarr[$j + 1];
                        $keyarr[$j + 1] = $temp;
                    }
                }
            }
            // var_dump($keyarr);
            for ($i=0; $i < sizeof($keyarr); $i++) { 
                $arr6[$keyarr[$i]] = $temparr[$keyarr[$i]];
            }
            $arr['Address Book Detail'] = $arr6;
            Utility::writeJson($arr,'address_book');
        }
    }

    public function print()
    {
        $arr = Utility::readJson('address_book');
        $temparr = $arr['Address Book Detail'];
        foreach ($temparr as $key => $value) {
            echo "--------Users Details---------\n".$key."\n";
            echo "Address : ".$value['Address']."\n".$value['City'].", ".$value['State']." - ".$value['Zipcode']."\nPhone Number : ".$value['Phone Number']."\n"; 
            echo "-----------------------------------------------------------------------\n";
        }
    }

}

$obj = new Address_Book();
echo "Add new account\n";
$obj->init_new_account();
$obj->print();
echo "Add new account\n";
$obj->init_new_account();
$obj->print();
echo "Delete existing account\n";
$obj->delete_user();
$obj->print();
echo "Edit existing account\n";
$obj->edit_exist_user();
$obj->print();
echo "Sort throught lastname\n";
$obj->sort('lastname');
$obj->print();
echo "Sort throught zipcode\n";
$obj->sort('zipcode');
$obj->print();

?>