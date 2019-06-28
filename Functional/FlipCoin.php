    <?php
    
      $total;
      echo "Enter No. of Coin to be Flipped : ";
      fscanf(STDIN,"%d\n",$total);
      FlipCoin($total);

      function FlipCoin($total)
      {
        $head = 0;
        $tail = 0;
        for ($i = 0; $i < $total; $i++) {
          if (rand(0,1) < 0.5) {
            $head++;
          }
          else {
            $tail++;
          }
        }

        $headperc = ($head / $total) * 100;
        $tail = ($tail / $total) * 100;
        echo "Percentage of Head Flip : $headperc \n";
        echo "Percentage of Tail Flip : $tail";
      }
     ?>
