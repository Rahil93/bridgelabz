<?php

  require 'Utility.php';

  $arrnum = array(5,7,8,2,1,4,9,6,3,0);
  $arrstr = array("sfsf","afaf","hgdg","bnfb","dhth");
  $arr_elapsed = [];
  $j = 0;
  $start;
  $end;
  $elapsed;

  $start = microtime(true);
  $arrnum = Utility::bubbleSort($arrnum);
  echo "Sorting Value Are...\n";
  for ($i = 0; $i < sizeof($arrnum); $i++) {
    echo $arrnum[$i]."\n";
  }
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Bubble Sort Integer";
  $j++;

  $start = microtime(true);
  $arrstr = Utility::bubbleSort($arrstr);
  echo "Sorting Value Are...\n";
  for ($i = 0; $i < sizeof($arrstr); $i++) {
    echo $arrstr[$i]."\n";
  }
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Bubble Sort String";
  $j++;

  $start = microtime(true);
  $arrnum = Utility::insertionSort($arrnum);
  echo "Sorting Value Are...\n";
  for ($i = 0; $i < sizeof($arrnum); $i++) {
    echo $arrnum[$i]."\n";
  }
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Insertion Sort Integer";
  $j++;

  $start = microtime(true);
  $arrstr = Utility::insertionSort($arrstr);
  echo "Sorting Value Are...\n";
  for ($i = 0; $i < sizeof($arrstr); $i++) {
    echo $arrstr[$i]."\n";
  }
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Insertion Sort String";
  $j++;

  $start = microtime(true);
  $str = 4;
  $mid = Utility::binarysrch($arrnum,0,sizeof($arrnum) - 1,$str);
  echo "$str found at location $mid \n";
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Binary Search for Integer";
  $j++;

  // echo "\nDescending Sorted Time are : \n";
  // $arr = Utility::descsort($arr_elapsed);
  // for ($i = 0; $i < sizeof($arr); $i++) {
  //   echo $arr[$i]."\n";
  // }

  $start = microtime(true);
  $str = "dhth";
  $mid = Utility::binarysrch($arrstr,0,sizeof($arrstr),$str);
  echo "$str found at location $mid ";
  $end = microtime(true);
  $elapsed = $end - $start;
  $arr_elapsed[$j] = $elapsed." : Binary Search for String";
  $j++;

  echo "\nDescending Sorted Time are : \n";
  $arr = Utility::descsort($arr_elapsed);
  for ($i = 0; $i < sizeof($arr); $i++) {
    echo $arr[$i]."\n";
  }



 ?>
