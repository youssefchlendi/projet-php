
<?php session_start();
  include 'header.phtml';
?>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are CoolFood
              </h2>
            </div>
            <p>
              There are many variations of food lovers with our menu we're trying to please all of them, but the majority have problems getting their food 
            . That's why we're providing your with this service hoping to satisfy your wishes to get your best meal home.
              </p>
            <a href="menu.php">
              Get your food
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
  <?php
include 'footer.phtml';
?>