    <?php
        $stake;
        echo "Enter the Stakes of the Gambler : ";
        fscanf(STDIN,"%s\n",$stake);
        $goal;
        echo "Enter the Goal of the Gambler : ";
        fscanf(STDIN,"%s\n",$goal);
        $trail;
        echo "Enter No. of Trail : ";
        fscanf(STDIN,"%s\n",$trail);
        gambler($stake,$goal,$trail);

      function gambler($stake,$goal,$trail)
      {
        $cash = $stake;
        $win = 0;
        $bet = 0;
        while ($cash > 0 && $cash < $goal) {
          $bet++;
          if (rand(0,1) > 0.5) {
            $cash++;
          }
          else {
            $cash--;
          }
          if ($cash == $goal) {
            $win++;
          }
        }
        $perc = ($win / $trail) * 100;
        echo "$win out of $trail \n";
        echo "No. of bets made : $bet \n";
        echo "Percentage of win : $perc \n";
      }
     ?>
