<?php
@session_start();
$id_promotor = $_GET['id'];
$_SESSION['id_promotor'] = $id_promotor;
header('location: index.php');