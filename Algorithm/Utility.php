<?php

class Utility{

  // Factorial

  function factorial($num)
    {
        $fact = 1;
        for ($i = 1; $i <= $num; $i++)
        {
            $fact = $fact * $i;
        }
        return $fact;
    }

  // Anagram

  public static function Anagram($string1,$string2)
  {
    $string1 = strtolower($string1);
    $string2 = strtolower($string2);

    $strcount1 = strlen($string1);
    $strcount2 = strlen($string2);
    $count = 0;

    if ($strcount1 != $strcount2) {
      return false;
    }

    $strarr1 = str_split($string1);
    $strarr2 = str_split($string2);

    $sortstr1 = Utility::sort($strarr1);
    $sortstr2 = Utility::sort($strarr2);

    for ($j = 0; $j < sizeof($sortstr1); $j++) {
      if (strcmp($sortstr1[$j],$sortstr2[$j]) == 0) {
        $count++;
      }
    }

    return $count == sizeof($sortstr1);
  }

  // Sorting

  public static function sort($string)
  {

    $temp;
    $n = sizeof($string) - 1;
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $n - $i; $j++) {
        if (strcmp($string[$j],$string[$j + 1]) == 1) {
          $temp = $string[$j];
          $string[$j] = $string[$j + 1];
          $string[$j + 1] = $temp;
        }
      }
    }
    return $string;
  }

  // Check prime no.

  public static function isprime($num)
  {
    if ($num <= 2) {
      return false;
    }
    for ($i = 2; $i * $i <= $num; $i++) {
      if ($num % $i == 0) {
        return false;
      }
    }
    return true;
  }

  // Palindrome

  public static function ispalindrom($nums)
  {
    $checknum = $nums;
    $ognum = $nums;
    $tempno = 0;
    while ($checknum != 0) {
      $d = $checknum % 10;
      $tempno = $tempno * 10 + $d;
      $checknum = (int)($checknum / 10);
    }
    return $nums == $tempno;
  }

  // Descending Sort

  public static function descsort($string)
  {

    $temp;
    $n = sizeof($string) - 1;
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $n - $i; $j++) {
        if (strcmp($string[$j],$string[$j + 1]) == -1) {
          $temp = $string[$j];
          $string[$j] = $string[$j + 1];
          $string[$j + 1] = $temp;
        }
      }
    }
    return $string;
  }

  // Binary Search

  public static function binarysrch($arr,$start,$end,$num)
  {
    try {
      $mid = floor($end / 2);

      if ($end >= $start) {
        if (strcmp($arr[$mid],$num) == 0) {
          return $mid;
        }

        if (strcmp($arr[$mid],$num) == 1) {
          return Utility::binarysrch($arr,$start,$mid - 1,$num);
        }
        else {

          return Utility::binarysrch($arr,$mid + 1,$end,$num);
        }
      }
    } catch (Exception $e) {
      echo "Out of memory";
    }
  }

  // Binary Search for Find

  public static function binarySearch($numarr,$size,$low)
  {
    // $low = 0;
    $mid = (int)(($low + ($size - 1)) / 2) ;
    $choice;
    if ($low < ($size)) {
      echo "Is the number lies between $low & $mid : \n";
      for ($i = $low; $i <= $mid; $i++) {
        echo $numarr[$i]." ";
      }
      echo "\nEnter Your Choice 'y' or 'n' : ";
      fscanf(STDIN,"%s\n",$choice);
      if ($choice == "n") {
        $low = $mid + 1;
        Utility::binarySearch($numarr,$size,$low);
      }
      else {
        $size = $mid;
        Utility::binarySearch($numarr,$size,$low);
      }
    }
    elseif ($low == $size) {
      echo "The no. u are searching is : ".$numarr[$low];
    }

  }

  // Insertion Sort

  public static function insertionSort($arr)
  {
    $temp;
    $j;
    for ($i = 1; $i < sizeof($arr); $i++) {
      $temp = $arr[$i];
      $j = $i - 1;
      while ($j >=0 && strcmp($arr[$j],$temp) == 1) {
        $arr[$j + 1] = $arr[$j];
        $j--;
      }
      $arr[$j + 1] = $temp;
    }
    return $arr;
  }

  // Bubble Sort

  public static function bubbleSort($arr)
  {
    $temp;
    $n = sizeof($arr) - 1;
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $n - $i; $j++) {
        if (strcmp($arr[$j], $arr[$j + 1]) == 1) {
          $temp = $arr[$j];
          $arr[$j] = $arr[$j + 1];
          $arr[$j + 1] = $temp;
        }
      }
    }
    return $arr;
  }

  // Merge Sort

  public static function mergeSort($arr)
  {
    $mid = (int) (sizeof($arr) / 2) ;
    // echo "Mid : ".$mid;
    $leftarr = Utility::mergeSort(array_slice($arr,0,$mid));
    $rightarr = Utility::mergeSort(array_slice($arr,$mid));
    return Utility::merge($leftarr,$rightarr);
  }

  public static function merge($leftarr,$rightarr)
  {
    $mergedarr = [];

    while (sizeof($leftarr) > 0 && sizeof($rightarr) > 0) {
      if (strcmp($leftarr[0],$rightarr[0]) == 1) {
        array_push($mergedarr, array_shift($leftarr));
      }
      else {
        array_push($mergedarr, array_shift($rightarr));
      }
    }
    while (sizeof($rightarr) > 0) {
      array_push($mergedarr, array_shift($rightarr));
    }
    while (sizeof($leftarr) > 0) {
      array_push($mergedarr, array_shift($leftarr));
    }

    return $mergedarr;
  }

  // Vending Machine

  public static function vendingmachine($arr,$change,$pos)
  {
    $arrnote = array(2000,500,200,100,50,20,10,5,2,1);
    $tempchange = $change;
    $temppos = $pos;
    while ($temppos < sizeof($arrnote)) {
      if ($tempchange < $arrnote[$temppos]) {
        $temppos++;

        Utility::vendingmachine($arr,$tempchange,$temppos);
      }
      else {
        $tempchange = $tempchange - $arrnote[$temppos];
        $arr[$temppos]++;
        Utility::vendingmachine($arr,$tempchange,$temppos);
      }
    }
    return $arr;
  }

  // Day of Week

  public static function dayofweek($m,$d,$y)
  {
    $y0 = floor($y - (14 - $m) / 12) + 1;
    $x = floor($y0 + $y0 / 4 - $y0 / 100 + $y0 / 400);
    $m0 = ($m + 12 * floor(((14 / $m) / 12)) - 2);
    $d0 = floor(($d + $x + floor(31 * $m0 / 12)) % 7);
    return $d0;
  }

  // Monthly Payment

  public static function mon_pay($P,$Y,$R)
  {
    $n =  12 * $Y;
    $r =  $R /(12 * 100);
    // $payment = 0.00;
    $payment = (double)(($P * $r)/(double)((1 - (double)((1 + $r)**(-n)))));
    return $payment;
  }

  public static function newsqrt($c)
  {
    $t = $c;
    $epsilon = 1 * M_E - 15;
    while (abs($t - $c/$t) > $epsilon * $t) {
      $t = (($c/$t) + $t) / 2;
    }
    return $t;
  }

  // Decimal to Binary Conversion

  public static function binary($d)
  {
    $rem;
    $bin = array("0","1");
    $binary = "";
    $temp = $d;
    $padding = (int) 0;
    while ($temp > 0 || $padding % 8 != 0) {
      $rem = (int) $temp % 2;
      $binary = ($bin[$rem]).$binary;
      $temp = (int) $temp / 2;
      $padding++;
      if ($padding % 4 == 0) {
        $binary = " ".$binary;
      }
    }
    return $binary;
  }

  // Binary  swap

  public static function binaryswap($d)
  {

    $temp = $d;
    $temp = str_replace(" ","",$temp);
    $lowernibble = substr($temp,0,4);
    $uppernibble = substr($temp,4,8);
    $swappedstr = ($uppernibble)." ".($lowernibble);
    return $swappedstr;
  }

  //  Binary To Decimal Conversion

  public static function decimal($b)
  {
    $power = 0;
    $decimal = 0;
    $b = str_replace(" ","",$b);
    $index = strlen($b) - 1;
    while ($index >= 0) {
      $decimal = $decimal + (int) ($b{$index}) * pow(2,$power);
      $index--;
      $power++;
    }
    return $decimal;

  }

  // Temperature Conversion

  public static function tempconv($c,$f)
  {
    $fahrenheit = ($c * (9/5)) + 32;
    $celsius = ($f - 32) * (5/9);
    echo "Celsius to Fahrenheit : $fahrenheit\n";
    echo "Fahrenheit to Celsius : $celsius";
  }

  public static function Printcalender($arr)
    {
        echo "Sun  Mon  Tue  Wed  Thu  Fri  Sat\n";
        for ($i = 0; $i < 6; $i++) 
        {
            for ($j = 0; $j < 7; $j++)
            {
                if ($arr[$i][$j] == '-' || $arr[$i][$j] > 31)
                {
                    echo "     ";
                } 
                else 
                {
                if ($arr[$i][$j] < 10) 
                {
                    echo $arr[$i][$j] . "    ";
                } 
                else 
                 {
                        echo $arr[$i][$j] . "   ";
                }
            }
        }
            echo "\n";
        }
    }
    public static function arrayFill($start, $arr, $end)
    {
        $count = 1;
        for ($i = $start; $i < 7; $i++) {
            $arr[0][$i] = $count++;
        }
        for ($i = 1; $i < 6; $i++) {
            for ($j = 0; $j < 7 && $count <= $end; $j++) {
                $arr[$i][$j] = $count++;
            }
        }
        return $arr;
    }
    public static function initArray()
    {
        $arr = [];
        for ($i = 0; $i < 6; $i++) {
            $array1 = array();
            for ($j = 0; $j < 7; $j++) {
                $array1[$j] = '-';
            }
            array_push($arr, $array1);
        }
        return $arr;
    }
    public static function calTotal($month, $year)
    {
        if ($month < 8)
        {
        
            if ($month % 2 == 0) 
            {
                if ($month == 2) 
                {
                    if (Utility::leap_year($year)) 
                    {
                            return 29;
                    }
                return 28;
                }
            return 30;
            } 
            else 
            {
                return 31;
            }
        }
        else
        {
            if ($month % 2 == 0) 
            {
                return 31;
            }
            return 30;
        }
    }
}



 ?>
