<?php
$arr = [[]];
static $size = 3;
  class TicTacToe{

    public static function input()
    {
      global $arr;
      global $size;
      for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
          $arr[$i][$j] = "-";
        }
      }
    }

    public static function userinput()
    {
      global $arr;
      global $size;
      $row;
      echo "Enter row : ";
      fscanf(STDIN,"%s\n",$row);
      $column;
      echo "Enter column : ";
      fscanf(STDIN,"%s\n",$column);
      if ($row <= $size && $column <= $size) {
        if ($arr[$row - 1][$column - 1] == "-") {
          $arr[$row - 1][$column - 1] = "X";
        }
        elseif ($arr[$row - 1][$column - 1] == "O" || $arr[$row - 1][$column - 1] == "X") {
          echo "Please enter correct value\n";
          TicTacToe::userinput();
        }
      }
      else {
        echo "Please enter correct value\n";
        TicTacToe::userinput();
      }
    }

    public static function computerinput()
    {
      $flag = 0;
      global $arr, $size;

      // Diagonal 1 for computercheck

      if ($flag != 1) {
        $i = 0;
        $j = 0;
        $count = 0;
        while ($i < $size && $j < $size) {
          if($arr[$i][$j] == "O")
          {
            $count++;
          }
          $i++;
          $j++;
        }
        $i = 0;
        $j = 0;
        if ($count == 2) {
          while ($i < $size && $j < $size) {
            if($arr[$i][$j] == "-")
            {
              $arr[$i][$j] = "O";
              $flag = 1;
            }
            $i++;
            $j++;
          }
        }
      }

      // Diagonal 1 for usercheck

      if ($flag != 1) {
        $i = 0;
        $j = 0;
        $count = 0;
        while ($i < $size && $j < $size) {
          if($arr[$i][$j] == "X")
          {
            $count++;
          }
          $i++;
          $j++;
        }
        $i = 0;
        $j = 0;
        if ($count == 2) {
          while ($i < $size && $j < $size) {
            if($arr[$i][$j] == "-")
            {
              $arr[$i][$j] = "O";
              $flag = 1;
            }
            $i++;
            $j++;
          }
        }
      }

      // Diagonal 2 for computercheck

      if ($flag != 1) {
        $i = 0;
        $j = $size - 1;
        $count = 0;
        while ($i < $size && $j >= 0) {
          if ($arr[$i][$j] == "O") {
            $count++;
          }
          $i++;
          $j--;
        }
        $i = 0;
        $j = $size - 1;
        if ($count == 2) {
          while ($i < $size && $j >= 0) {
            if ($arr[$i][$j] == "-") {
              $arr[$i][$j] = "O";
              $flag = 1;
              break;
            }
            $i++;
            $j--;
          }
        }
      }

      // Diagonal 2 for usercheck

      if ($flag != 1) {
        $i = 0;
        $j = $size - 1;
        $count = 0;
        while ($i < $size && $j >= 0) {
          if ($arr[$i][$j] == "X") {
            $count++;
          }
          $i++;
          $j--;
        }
        $i = 0;
        $j = $size - 1;
        if ($count == 2)
        {
          while ($i < $size && $j >= 0) {
            if ($arr[$i][$j] == "-") {
              $arr[$i][$j] = "O";
              $flag = 1;
              break;
            }
            $i++;
            $j--;
          }
        }
      }

      // Horizontal computercheck

      if ($flag != 1) {
        for ($i = 0; $i < $size; $i++) {
          $count = 0;
          for ($j = 0; $j < $size; $j++) {
            if ($arr[$i][$j] == "O") {
              $count++;
            }
            if ($count == 2) {
              for ($m = $i; $m < $size; $m++) {
                for ($n = 0; $n < $size; $n++) {
                  if ($arr[$i][$j] == "-") {
                    $arr[$i][$j] = "O";
                    $flag = 1;
                  }
                  if ($flag == 1) {
                    break;
                  }
                }
                if ($flag == 1) {
                  break;
                }
              }
            }
            if ($flag == 1) {
              break;
            }
          }
          if ($flag == 1) {
            break;
          }
        }
      }

      // Horizontal usercheck

      if ($flag != 1) {
        for ($i = 0; $i < $size; $i++) {
          $count = 0;
          for ($j = 0; $j < $size; $j++) {
            if ($arr[$i][$j] == "X") {
              $count++;
            }
            if ($count == 2) {
              for ($m = $i; $m < $size; $m++) {
                for ($n = 0; $n < $size; $n++) {
                  if ($arr[$i][$j] == "-") {
                    $arr[$i][$j] = "O";
                    $flag = 1;
                  }
                  if ($flag == 1) {
                    break;
                  }
                }
                if ($flag == 1) {
                  break;
                }
              }
            }
            if ($flag == 1) {
              break;
            }
          }
          if ($flag == 1) {
            break;
          }
        }
      }

      // Vertical computercheck

      if ($flag != 1) {
        for ($j = 0; $j < $size; $j++) {
          $count = 0;
          for ($i = 0; $i < $size; $i++) {
            if ($arr[$i][$j] == "O") {
              $count++;
            }
            if ($count == 2) {
              for ($n = $j; $n < $size; $n++) {
                for ($m = 0; $m < $size; $m++) {
                  if ($arr[$m][$n] == "-") {
                    $arr[$m][$n] = "O";
                    $flag = 1;
                  }
                  if ($flag == 1) {
                    break;
                  }
                }
                if ($flag == 1) {
                  break;
                }
              }
            }
            if ($flag == 1) {
              break;
            }
          }
          if ($flag == 1) {
            break;
          }
        }
      }

      // Vertical usercheck

      if ($flag != 1) {
        for ($j = 0; $j < $size; $j++) {
          $count = 0;
          for ($i = 0; $i < $size; $i++) {
            if ($arr[$i][$j] == "X") {
              $count++;
            }
            if ($count == 2) {
              for ($n = $j; $n < $size; $n++) {
                for ($m = 0; $m < $size; $m++) {
                  if ($arr[$m][$n] == "-") {
                    $arr[$m][$n] = "O";
                    $flag = 1;
                  }
                  if ($flag == 1) {
                    break;
                  }
                }
                if ($flag == 1) {
                  break;
                }
              }
            }
            if ($flag == 1) {
              break;
            }
          }
          if ($flag == 1) {
            break;
          }
        }
      }

      if ($flag != 1) {
        for ($i = 0; $i < $size; $i++) {
          for ($j = 0; $j < $size; $j++) {
            if ($arr[$i][$j] == "-") {
              $arr[$i][$j] = "O";
              $flag = 1;
            }
            if ($flag == 1) {
              break;
            }
          }
          if ($flag == 1) {
            break;
          }
        }
      }

    }

    public static function userVictory()
    {
      global $arr,$size;
      $count;

      for ($i = 0; $i < $size; $i++) {
        $count = 0;
        for ($j = 0; $j < $size; $j++) {
          if ($arr[$i][$j] == "X") {
            $count++;
          }
          if ($count == 3) {
            return true;
          }
        }
      }

      for ($j = 0; $j < $size; $j++) {
        $count = 0;
        for ($i = 0; $i < $size; $i++) {
          if ($arr[$i][$j] == "X") {
            $count++;
          }
          if ($count == 3) {
            return true;
          }
        }
      }

      $i = 0;
      $j = 0;
      $d1count = 0;
      while ($i < $size && $j < $size) {
        if ($arr[$i][$j] == "X") {
          $d1count++;
        }
        $i++;
        $j++;
      }

      $i = 0;
      $j = $size - 1;
      $d2count = 0;
      while ($i < $size && $j >= 0) {
        if ($arr[$i][$j] == "X") {
          $d2count++;
        }
        $i++;
        $j--;
      }
      return ($d1count == $size || $d2count == $size);
    }

    public static function computerVictory()
    {
      global $arr,$size;
      $count;

      for ($i = 0; $i < $size; $i++) {
        $count = 0;
        for ($j = 0; $j < $size; $j++) {
          if ($arr[$i][$j] == "O") {
            $count++;
          }
          if ($count == 3) {
            return true;
          }
        }
      }

      for ($j = 0; $j < $size; $j++) {
        $count = 0;
        for ($i = 0; $i < $size; $i++) {
          if ($arr[$i][$j] == "O") {
            $count++;
          }
          if ($count == 3) {
            return true;
          }
        }
      }

      $i = 0;
      $j = 0;
      $d1count = 0;
      while ($i < $size && $j < $size) {
        if ($arr[$i][$j] == "O") {
          $d1count++;
        }
        $i++;
        $j++;
      }

      $i = 0;
      $j = $size - 1;
      $d2count = 0;
      while ($i < $size && $j >= 0) {
        if ($arr[$i][$j] == "O") {
          $d2count++;
        }
        $i++;
        $j--;
      }
      return ($d1count == $size || $d2count == $size);
    }

    public static function draw()
    {
      $flag = 0;
      global $arr,$size;
      for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
          if ($arr[$i][$j] == "-") {
            $flag = 1;
          }

        }
      }
      if ($flag == 0) {
        // echo "draw";
        return true;
      }
    }

    public static function display()
    {
      global $arr;
      global $size;
      for ($i=0; $i < $size; $i++) {
        for ($j=0; $j < $size; $j++) {
          echo $arr[$i][$j]." ";
        }
        echo "\n";
      }
    }
  }

  TicTacToe::input();
  TicTacToe::display();
  echo "\n";
  do {
    TicTacToe::userinput();
    echo "\n";
    if (TicTacToe::userVictory()) {
      echo "Hurry u Win....\n\n";
      TicTacToe::display();
      break;
    }
    TicTacToe::display();
    echo "\n";
    TicTacToe::computerinput();
    if (TicTacToe::computerVictory()) {
      echo "Oh no......You Lose\n\n";
      TicTacToe::display();
      break;
    }
    echo "\n";
    if (TicTacToe::draw()) {
      echo "Hassh Draw......";
      break;
    }
    TicTacToe::display();
  } while (!TicTacToe::userVictory() || !TicTacToe::computerVictory() || !TicTacToe::draw());
 ?>
