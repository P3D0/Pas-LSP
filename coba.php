<?php
    $password = "Ucup";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    echo($password_hash);

    //Coaba verifikasi password

   $test02 = password_verify($password, $password_hash);
   
   if($test02 == true) {
      echo "<br> VALID password for the informed HASH!<br>"; 
      var_dump($test02);
   } else {
      echo "<br>INVALID password for the informed HASH!<br>";     
      var_dump($test02);    
   }
?>