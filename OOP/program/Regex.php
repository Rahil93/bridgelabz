<?php

require 'Utility.php';

class Regex
{
    // Get a file name from user to make json file eg:Regex. 
    public function filename()
    {
        $file;
        echo "Enter the file name : ";
        fscanf(STDIN,"%s\n",$file);
        return $file;
    }

    // Return a string which we have to modified.
    public function getString()
    {
        $str = "Hello <<name>>, We have your full name as <<full name>> in our system. Your contact number is 91-xxxxxxxxxx. Please,let us know in case of any clarification. Thank you BridgeLabz 01-01-2016.";
        return $str;
    }
    // Replace dummy string with valid user input string eg name replace to Rahil
    public function replaceString($str)
    {
        $name = "Rahil";
        echo "Enter your name : ";
        fscanf(STDIN,"%s\n",$name);
        $modified_str = preg_replace("/<{2}+(\w+)+>{2}/",$name,$str);

        $fullname;
        echo "Enter your full name : ";
        fscanf(STDIN,"%s\n",$fullname);
        $modified_str = preg_replace("/<{2}+(\w+)+\s+(\w+)+>{2}/",$fullname,$modified_str);

        $contact_num;
        echo "Enter your phone number : ";
        fscanf(STDIN,"%s\n",$contact_num);
        $modified_str = preg_replace("/x{10}/",$contact_num,$modified_str);

        $date = date("d/m/Y");
        $modified_str = preg_replace("/\d\d+-{1}+\d\d+-{1}+\d\d\d\d/",$date,$modified_str);
        echo $modified_str."\n";

    }
}

$obj = new Regex();
$filename = $obj->filename();
$str = $obj->getString();
Utility::writeJson($str,$filename);
$data = Utility::readJson($filename);
$obj->replaceString($data);

?>