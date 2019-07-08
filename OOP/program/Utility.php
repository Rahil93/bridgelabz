<?php

class Utility
{
    // convert array into json format & store in json file
    public function writeJson($arr,$file)
    {
        $jsondata = json_encode($arr);
        $path = "../JSON_file/";
        $fullpath = $path . $file.".json";
        file_put_contents($fullpath,$jsondata);
    }
    // fetch the json data & convert into array a readable format
    public function readJson($file)
    {   
        $path = "../JSON_file/";
        $fullpath = $path . $file.".json";
        $str = file_get_contents($fullpath);
        $arr = json_decode($str,true);
        return $arr;
    }   
}


?>