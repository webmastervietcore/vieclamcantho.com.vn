<?php

require 'db.php';
deletecookie("authentic");
  if(isset($_SESSION['nowpage']))
        header('location: ' .$_SESSION['nowpage']);  
      else
  header('location: ' . URL .'dang-tin-tuyen-dung.html');  