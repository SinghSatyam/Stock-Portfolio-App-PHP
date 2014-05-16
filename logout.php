<?php
session_start();
$user_name=0;
$user_password=0;
session_destroy();
 header( 'Location: index.php' ) ;
?>
