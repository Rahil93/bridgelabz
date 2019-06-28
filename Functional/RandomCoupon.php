    <?php
        $num;
        echo "Enter No. of Random Coupon to be generated : ";
        fscanf(STDIN,"%s\n",$num);
        A::countDistinct($num);

      class A{
        public static function randomgenerator()
        {
          $randomnum = 1000 + rand() * (9999 - 1000);
          return $randomnum;
        }

        public static function countDistinct($num)
        {
          $arr = [];
          $randomno;
          $flag = 0;
          $count = 1;
          $arr[0] = A::randomgenerator();
          for ($i = 1; $i < $num; $i++) {
            if ($flag == 1) {
              $i--;
            }
            $randomno = A::randomgenerator();
            $flag = 0;
            for ($j = 0; $j < $i; $j++) {
              if ($arr[$j] == $randomno) {
                $flag = 1;
                break;
              }
            }
            if ($flag == 0) {
              $arr[$i] = $randomno;
            }
          }
          A::display($arr);
          // echo "I : ".$i;
        }

        public static function display($arr)
        {
          echo "Random Coupon are..\n";
          foreach ($arr as $value) {
            echo "$value \n";
          }
      }

      }
     ?>
