<?php

include 'head.php';
global $conn;
$now = time();
if(isset($_SESSION['expire']) && $now > $_SESSION['expire'])
{
    session_destroy();
}
if(isset($_GET['vid'])){
    $id = $_GET['vid'];
}
$query = "SELECT * FROM video_info where id ='$id'";
$row = mysqli_fetch_assoc(mysqli_query($conn,$query));
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $row['video_title'] ?></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><?php echo $row['video_title'] ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gg">
          <div class="col-md-9">
            <div class="row">
              <div class="col-lg-8">

                  <?php
                  if(isset($_SESSION['active'])){
                  ?>
                      <div class="embed-responsive embed-responsive-16by9">

                          <iframe width="623px" height="350px" src="https://www.youtube.com/embed/<?php echo $row['video_code'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                  <?php
                  }
                  else{

                  ?>
                      <img src="<?php echo $row['video_thumbnail'] ?>" alt="" data-aos="zoom-out" data-aos-delay="100" width="623px">
                      <div>
                          <br>
                          <div class="d-flex justify-content-center">
                              <form action="video.php?vid=<?php echo $id?>" method="post">
                                  <div class="mb-3">
                                      <?php echo display_error(); ?>
                                      <label for="">Enter the password that you receive by mail</label>
                                      <input type="text" class="form-control" name="code" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the password">
                                      <input type="hidden" name="id" value="<?php echo $id?>">
                                  </div>

                                  <div class="d-flex justify-content-center" id="">
                                      <button type="submit" name="get_video" class="play-btn"><i class="fas fa-play"></i></button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  <?php
                  }
                  ?>
              </div>
              <div class="col-md-4">
                <h3 class="d-flex justify-content-center">Purchase This Video Only</h3>
                <div class="full-pay-box">
                  <div class="row">
                    <div class="col-9">
                      <a href="#">
                        <div class="pay d-flex justify-content-center">
                          <img src="assets/img/paypal.svg" alt="" width="100px">
                        </div>
                      </a>

                    </div>
                    <div class="col-3">
                      <div class="amount d-flex justify-content-center">
                        $<?php echo $row['video_price'] ?>
                      </div>

                    </div>
                  </div>
                </div>
                <br>
                <h4 class="d-flex justify-content-center">You will receive the password by mail after the payment is complete. </h4>
              </div>
            </div>
          </div>

          <div class="col-md-3" id="generic_price_table" style="">
            <h3 class="d-flex justify-content-center">Pay for Membership Access to All Video</h3>
            <!--PRICE CONTENT START-->
              <?php
              $price_q ="SELECT * FROM price";
              $price_result = mysqli_query($conn,$price_q);
              while ($price_row = mysqli_fetch_assoc($price_result)){

              ?>
            <div class="generic_content clearfix"">

              <!--HEAD PRICE DETAIL START-->
              <div class="generic_head_price clearfix">

                <!--HEAD CONTENT START-->
                <div class="generic_head_content clearfix">

                  <!--HEAD START-->
                  <div class="head_bg"></div>
                  <div class="head">
                    <span><?php echo $price_row['price_title'] ?></span>
                  </div>
                  <!--//HEAD END-->

                </div>
                <!--//HEAD CONTENT END-->

                <!--PRICE START-->
                <div class="generic_price_tag">
                                <span class="price">
                                    <span class="sign">$</span>
                                    <span class="currency"><?php echo $price_row['price_value'] ?></span>
                                    <span class="month">/MON</span>
                                </span>
                </div>
                <!--//PRICE END-->

              </div>
              <!--//HEAD PRICE DETAIL END-->

            </div>
            <!--//PRICE CONTENT END-->
              <?php
              }
              ?>

            <br>
            <br>
            <br>


          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php
include 'footer.php';
?></html>