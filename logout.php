<?php
   session_start();

   if(session_destroy()) {
      header("Location: Login_v14/index.html");
   }
?>
