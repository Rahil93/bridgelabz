<?php

  class twodarray{

    public static function iInput()
    {
      $arr = [[]];
      $row;
      echo "Enter Row : ";
      fscanf(STDIN,"%s\n",$row);
      $column;
      echo "Enter Column : ";
      fscanf(STDIN,"%s\n",$column);
      for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $column; $j++) {
          fscanf(STDIN,"%s\n",$arr[$i][$j]);
          if (!is_int($arr[$i][$j])) {
            echo "Enter Again\n";
            $j--;
          }
        }
      }
      twodarray::iOutput($arr,$row,$column);
    }

    public static function iOutput($arr,$row,$column)
    {
      for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $column; $j++) {
          echo $arr[$i][$j]."  ";
        }
        echo "\n";
      }
    }
  }

  twodarray::iInput();

 ?>
