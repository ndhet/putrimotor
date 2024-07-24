<?php
include_once("../helper/config.php");
include_once("../helper/function.php");

session_unset();
session_destroy();

redirect('/admin/login.php');

?>