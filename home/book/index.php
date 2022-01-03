
<?php session_start();
  include '../templates/hheader.phtml';
?>


  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2 class="text-danger">
          Contact us 
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="form_container">
            <form action="sendmail.php" method="post">
            <div>
                <input type="text" name="nom" class="form-control" placeholder="Your Last Name" />
              </div>
              <div>
                <input type="text" name="prenom" class="form-control" placeholder="Your First Name" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
              <textarea  name="text" class="form-control" placeholder="your message here" id="floatingTextarea"></textarea>

              </div>
              <div class="btn_box">
                <button type="submit" >
                  Send Email
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

<?php
include '../templates/hfooter.phtml';
?>