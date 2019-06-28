<?php

  require 'Utility.php';

  $month;
  echo "Enter month : ";
  fscanf(STDIN,"%s\n",$month);
  $date;
  echo "Enter date : ";
  fscanf(STDIN,"%s\n",$date);
  $year;
  echo "Enter year : ";
  fscanf(STDIN,"%s\n",$year);

  $arr = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

  echo "Day of the week that falls on date : ".$arr[Utility::dayofweek($month,$date,$year)];
 ?>
