<?php

class Utility
{
    // convert array into json format & store in json file
    public function writeJson($data,$file)
    {
        $jsondata = json_encode($data);
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
        $data = json_decode($str,true);
        return $data;
    }   
}


?>