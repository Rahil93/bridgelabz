<?php

  class SumIntegerZero{
    public static $arr = [];
    public static $size;

    public static function input()
    {
      echo "Enter the size of the array : ";
      fscanf(STDIN,"%s\n",$size);
      echo "Enter $size Integer\n";
      for ($i = 0; $i < $size; $i++) {
          fscanf(STDIN,"%s\n",$arr[$i]);
      }
       return $arr;
    }
    public static function countDistinct($arr)
    {
      $count = 0;
      $size = sizeof($arr);
      for ($i = 0; $i < $size; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
          for ($k = $j + 1; $k < $size; $k++) {
            if ($arr[$i] + $arr[$j] + $arr[$k] == 0) {
              echo "$arr[$i]  $arr[$j]  $arr[$k]\n";
              $count++;
            }
          }
        }
      }
      echo "No. of distinct pairs : $count";
    }
  }

  $arr = SumIntegerZero::input();
  SumIntegerZero::countDistinct($arr);

 ?>
