<?php
include_once('../config/config.php');
include_once('../class/data.class.php');

$mysqli = new data(HOST, USERNAME, PASSWORD, DATABASE);

if(isset($_POST['regione']))
{
	$datastore = $mysqli->getProvince($_POST['regione']);
}
if(isset($_POST['provincia']))
{
	$datastore = $mysqli->getComuni($_POST['provincia']);
}
if(isset($_POST['cod_istat']))
{
	$datastore = $mysqli->getCap($_POST['cod_istat']);
}
echo json_encode($datastore);
?>
