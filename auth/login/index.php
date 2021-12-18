<?php
session_start();
if (!empty($_SESSION['client'])&&isset($_SESSION['client'])){
	if ($_SESSION['client'])
   		 header("location: ../../home");
}
$title ='Login';
include 'index.phtml';


?>