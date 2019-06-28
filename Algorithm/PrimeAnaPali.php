<?php

  require ('Utility.php');

  echo "Prime & Palindrom No. are..\n";
  for ($i = 10; $i < 1000; $i++) {
        if (Utility::isprime($i) && Utility::isPalindrom($i)) {
          echo $i."\n";
        }
  }

  echo "Prime & Anagram Are..\n";
  for ($i = 10; $i < 1000; $i++) {
    for ($j = $i + 1; $j < 1000; $j++) {
        if (Utility::isprime($i) && Utility::isprime($j) && Utility::Anagram($i,$j)) {
          echo $i."\n";
        }
    }
  }
  echo "Prime, Palindrome & Anagram Are..\n";

  for ($i = 10; $i < 1000; $i++) {
    for ($j = $i + 1; $j < 1000; $j++) {
        if (Utility::isprime($i) && Utility::isprime($j) && Utility::isPalindrom($i) && Utility::isPalindrom($j) && Utility::Anagram($i,$j)) {
          echo $i."\n";
        }
    }
  }
 ?>
