<?php

  require 'Utility.php';

  $string1;
  echo "Enter First String : ";
  fscanf(STDIN,"%s\n",$string1);
  $string2;
  echo "Enter Second String : ";
  fscanf(STDIN,"%s\n",$string2);
  checkAnagram($string1,$string2);

  function checkAnagram($string1,$string2)
  {
    if (Utility::Anagram($string1,$string2)) {
      echo "$string1 & $string2 are Anagram...";
    }
    else {
      echo "$string1 & $string2 are not Anagram...";
    }
  }

 ?>
