<?php

  class Quadratic{
    public static function input()
    {
      $a;
      echo "Enter value of a : ";
      fscanf(STDIN,"%s\n",$a);
      $b;
      echo "Enter value of b : ";
      fscanf(STDIN,"%s\n",$b);
      $c;
      echo "Enter value of c : ";
      fscanf(STDIN,"%s\n",$c);
      Quadratic::calc($a,$b,$c);
    }

    public static function calc($a,$b,$c)
    {
      $root1;
      $root2;
      $d;

      $d = $b * $b - (4 * $a * $c);
      if ($d > 0) {
        echo "Roots are real & unequal\n";
        $root1 = (-$b + sqrt($d)) / (2 * $a);
        $root2 = (-$b - sqrt($d)) / (2 * $a);
        echo "First Root are : $root1\n";
        echo "Second Root are : $root2";
      }
      elseif ($d == 0) {
        echo "Roots are real & equal\n";
        $root1 = (-$b + sqrt($d)) / (2 * $a);
        echo "Root are : $root1";
      }
      else {
        echo "Root Are Imaginary";
      }
    }
  }
  Quadratic::input();
 ?>
