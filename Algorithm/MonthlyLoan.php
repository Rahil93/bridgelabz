<?php

require 'Utility.php';

 $amt;
 echo "Enter the Amount of Loan Borrowed : ";
 fscanf(STDIN,"%d\n",$amt);
 $yr;
 echo "Enter the No. of Year of the Loan : ";
 fscanf(STDIN,"%d\n",$yr);
 $R;
 echo "Enter the Monthly Interest : ";
 fscanf(STDIN,"%d\n",$R);

 echo "Monthly Payment : ".Utility::mon_pay($amt,$yr,$R);

?>
