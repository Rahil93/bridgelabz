<?php

require '../../Algorithm/Utility.php';

function calender()
{
    echo "Enter the month between 1 to 12::\n ";
    $month;
    fscanf(STDIN,"%s\n",$month);
    while($month >12)
    {
        echo "Warning: Enter correct month:\n";
        fscanf(STDIN,"%s\n",$month);
    }
    echo "Enter the Year:\n ";
    $year;
    fscanf(STDIN,"%s\n",$year);
    while($year < 1000 || $year > 9999)
    {
        echo "Enter correct year between range 1000 to 9999.\n ";
        fscanf(STDIN,"%s\n",$year);
    }
  
    $arryear=array("jan","feb","march","april","may","june","july","august","sept","oct","november","december");
    $cal=Utility::initArray();
    $start=Utility::dayofweek(1,$month,$year);
    $end=Utility::calTotal($month,$year);
    $cal=Utility::arrayFill($start,$cal,$end);
    echo "\n";
    echo "Month: ".$arryear[$month-1]."---Year : ".$year."\n";
    echo "\n";
    Utility::Printcalender($cal);
}
calender();


?>