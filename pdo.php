<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=wedding_music', 
   'kleight', '1hr3A11W!');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>