<?php
session_start();
session_destroy();
$psn="Thanks....You are logout";
$alamat="../page_admin.php";
header("Location:$alamat");

?>