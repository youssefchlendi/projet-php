<?php
  $title = 'Orders';
  include '../init.php';
  include '../classes/orders.php';
  $order=new orders();
  session_start();
if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
	if (!$_SESSION['admin'])
   		 header("location: ../../home");
}

$rows=$order->getOrders();
if (isset($_POST['approved'])){
  $approved = checkData($_POST['app']);
  $cust=checkData($_POST['cust']);
  $id = checkData($_POST['id']);
  $approved=$approved?0:1;
  $d = date('Y-m-d H:i:s'); 
  $order->updateOrder($id,$approved,$d);
  $suj="Order ".($approved?"approved":"Disapproved").""; 
  $msg="Your order number  ".$id." has been ".($approved?"approved":"Disapproved")." For more details please call us";
  sendmail("CoolFood",customerDetails($cust)['email'],$suj,$msg);
  header("Refresh:0");
}
      if (isset($_POST['delete'])){
        $id = checkData($_POST['ID']);
        $order->remove($id);
        header("Refresh:0");

      }
include '../layout.phtml';
?>