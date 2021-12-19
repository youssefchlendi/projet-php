<?php 
$msg =$_GET["msg"];
$stat=$_GET["stat"];
$mail=$_GET["mail"];
$title = "Error";
include '../header.php';
?>
<h4 class="card-title"><?=$msg?></h4>
                            <div class="box container">
                        <?php if ($stat==2) echo '
                        <p class="row align-items-center mx-auto mt-5">
                        <a class=" ml-auto mr-auto  btn btn-primary btn-sm" href="../login" role="button">Continue to login page</a>
                      </p> ';                                    
                  
                    else if($stat==3)
                    echo "<p row align-items-center class=' mt-5'>
                    <form class='row align-items-center' method='POST' action='../verify/resend-verification.php'><input type='hidden' name='email' value='$mail'><button class=' ml-auto mr-auto btn btn-danger btn-sm' type='submit'>Renvoyer l'e-mail de vérification</button>
                    <a class='ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continue to login page</a>
                    </p>
                    ";

                    else 
                    echo '
                        <p class=" row align-items-center mt-5">
                        <a class="ml-auto mr-auto btn btn-primary btn-sm" href="../login" role="button">Continue to login page</a>
                      </p> 
                                             <p class=" row align-items-center mt-1">
                      <a class="ml-auto mr-auto btn btn-primary btn-sm" href="../register" role="button">Continue to Register page</a>
                    </p>';
                    ?>
</div>
<?php include '../footer.php' ?>
