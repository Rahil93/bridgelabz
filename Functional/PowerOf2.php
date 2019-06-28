    <?php

        $expo;
        echo "Enter the exponential : ";
        fscanf(STDIN,"%s\n",$expo);
        if ($expo >=0 && $expo < 31) {
          powerof2($expo);
        }
        else {
          echo "Value must be between 0 to 30";
        }

      function powerof2($expo)
      {
        for ($i = 0; $i <= $expo; $i++) {
          $pow = pow(2,$i);
          echo "2^$i = $pow \n";
        }
      }
     ?>
