<?php

   require_once __DIR__ . '/vendor/autoload.php';

   //Connect to mongodb
   $connect = new MongoDB\Client("mongodb+srv://zcmc_krizelleyana:a2SMvohDkcipV3yx@cluster0.klxmk.mongodb.net/");

   //Select a database
   $db = $connect->zcmc_referral;

   
   if(($connect && $db)) {
      // echo '<script>console.log("Connected to database");</script>';
   }

?>

