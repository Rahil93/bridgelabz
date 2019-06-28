    <?php

        $num;
        echo "Enter no. to be factorized : ";
        fscanf(STDIN,"%d\n",$num);
        factor($num);

        function factor($num)
        {
          $tempnum = $num;
          echo "Factorization of $num = ";
          for ($i = 2; $i * $i <= $num; $i++) {
            while ($tempnum % $i == 0) {
              $tempnum /= $i;
              if ($tempnum == 1) {
                echo "$i";
              }
              else {
                echo "$i * ";
              }
            }
          }
          if ($tempnum > 1) {
            echo "$tempnum";
          }
        }
 ?>
