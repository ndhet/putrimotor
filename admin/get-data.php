<?php

include_once("../helper/config.php");
include_once("../helper/function.php");

$id = $_POST['id'];

$datamotor = getMotor($id);

if ($datamotor) {
	$res = $datamotor->fetch_array();
	echo json_encode($res);
}

?>