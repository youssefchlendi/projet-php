<?php
  $title = 'Customers';
  include '../init.php';
  include '../classes/client.php';
  session_start();
if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
	if (!$_SESSION['admin'])
   		 header("location: ../../home");
}
  $customer = new client();
  $rows=$customer->getClients();
include '../layout.phtml';
