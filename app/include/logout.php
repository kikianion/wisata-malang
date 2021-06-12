<?php
session_start();
session_destroy();
$psn="Thanks....You are logout";
$alamat="../index.php?module=home";
header("Location:$alamat");

?>