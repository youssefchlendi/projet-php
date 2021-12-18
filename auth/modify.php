<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
    <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user">Edit</button>
    <div class="modal fade" role="dialog" tabindex="-1" id="user">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit profile</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" method="post" action="product.php" enctype="multipart/form-data" novalidate="">
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                            <div class="invalid-feedback">
                                What's your name?
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                Your email is invalid
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required data-eye>
                            <div class="invalid-feedback">
                                Password is required
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" class="form-control" name="phone" required  pattern="[0-9]{8}" >
                            <div class="invalid-feedback">
                                Phone is required
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input id="adresse" type="adresse" class="form-control" name="adresse" required >
                            <div class="invalid-feedback">
                                Adresse is required
                            </div>
                        </div>

                        <div class="form-group m-0">

                            <button type="reset" data-dismiss="modal" class="btn btn-danger btn-block " >Cancel</button>
                            <button type="submit" value="Submit" class="btn btn-primary btn-block " >Ajouter</button>

                        </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>