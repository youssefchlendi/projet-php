<?php
$rows=getOrderDetails($row['ID']);
$client=getClient($row['clientId']);
include 'details.phtml';