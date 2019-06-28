    <?php
        $username;
        echo "Enter UserName : ";
        fscanf(STDIN,"%s\n",$username);
        if (strlen($username) >= 3) {
          usernameenter($username);
        }
        else {
          echo "Re-Enter Your Name";
        }

      function usernameenter($username)
      {
        $string = "Hello <<UserName>>, How are u?";
        echo str_replace("<<UserName>>",$username,$string);
      }
     ?>
