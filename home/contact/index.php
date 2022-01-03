<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Form</title>
</head>
<body>
<center>

    
<h2 class="mt-4"> Fill the form so you can communicate with as</h2>
<br>
<form id ="myForm" action="" method="post">
<div class="container mt-5">
<div class="input-group">
<span class="input-group-text">First and last name</span>
<input type="text" aria-label="First name" name="prenom" class="form-control">
<input type="text" aria-label="Last name" name="nom" class="form-control  <?=$invalid_class_name ??""?>">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label" >Email address</label>
<input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="form-floating">
<textarea  name="text" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
<label for="floatingTextarea">Comments</label>
</div> <br> <br>
<div class="col-12">
<button  name="submit" class="btn btn-primary" type="submit">Submit form</button>
</div>
</div>
</form>

</center>
</body>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
function sendEmail() {
    var name = $("#nom");
    var email = $("#email");
    var subject = $("#text");
    

    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) ) {
        $.ajax({
           url: 'sendEmail.php',
           method: 'POST',
           dataType: 'json',
           data: {
               name: name.val(),
               email: email.val(),
               subject: subject.val(),
               
           }, success: function (response) {
                $('#myForm')[0].reset();
                $('.sent-notification').text("Message Sent Successfully.");
           }
        });
    }
}

function isNotEmpty(caller) {
    if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}
</script>
</body>
</html>