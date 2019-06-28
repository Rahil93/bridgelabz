    <?php
      function harmonic()
      {
        $N;
        echo "Enter Harmonic Number : ";
        fscanf(STDIN,"%d\n",$N);
        $harmonic = 1.0;

        echo "Harmonic Number Generation of $N are...\n";
        echo "1 + ";
        for ($i = 2; $i <= $N ; $i++) {
          $harmonic += 1.0/$i;
          if ($i == $N) {
            echo "1/$i = $harmonic";
          }
          else {
            echo "1/$i + ";
          }
        }
        return $harmonic;
      }
      harmonic();
     ?>
