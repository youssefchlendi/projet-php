<?php 
$msg =$_GET["msg"];
$stat=$_GET["stat"];
$title = "Error";
include '../header.php';
?>

<h4 class="card-title"><?php echo $msg?></h4>
                            <div class="box container">
                        <?php if ($stat==2||!$stat||$stat==3) echo '
                        <p class="row align-items-center mx-auto mt-5">
                        <a class=" ml-auto mr-auto  btn btn-primary btn-sm" href="../loginadmin" role="button">Continue to login page</a>
                      </p> '                 
                    ?>
                    						</div>
</div>
<?php include '../footer.php' ?>
