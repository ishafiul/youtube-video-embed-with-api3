<?php

include 'head.php';
$sql = sort_date();
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container container" data-aos="fade-in">
      <h1><?php echo $row['s_title']?></h1>
      <h3><?php echo $row['s_sub_title']?></h3>
      <br>
      <h2><?php echo $row['description']?></h2>
      <img src="assets/img/banner.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100" height="300px"/>

      <div class="container" id="get-started">
        <div class="row">

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <h4><?php echo $row['txt1_title']?></h4>
              <p><?php echo $row['txt1_description']?></p>

            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-block">

              <h4><?php echo $row['txt2_title']?></h4>
              <p><?php echo $row['txt2_description']?></p>

            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-block">

                <h4><?php echo $row['txt3_title']?></h4>
                <p><?php echo $row['txt3_description']?></p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section id="features" class="padd-section text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Amazing Features.</h2>
          <p class="separator">
          <div class="dropdown">
            <button class="btn btn-get-started dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Sort By:
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="?pricelowtohigh=true#features">Price - Cheap First</a></li>
              <li><a class="dropdown-item" href="?pricehightolow=true#features">Price - Most Expensive First</a></li>
              <li><a class="dropdown-item" href="?datefirsttolast=true#features">Date - Old First</a></li>
              <li><a class="dropdown-item" href="?#features">Date - New First</a></li>
            </ul>
          </div>
          </p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <?php

            function content($sql){
                global $conn;
            $res = mysqli_query($conn,$sql);
            while ($video=mysqli_fetch_assoc($res)){
            ?>
            <div class="col-md-6 col-lg-4">
              <div class="box">
               <div class="feature-block">
                <img src="<?php echo $video['video_thumbnail']?>" alt="img" height="300px" width="400px">
                <h4 class=""><?php echo $video['video_title']?></h4>
                 <div class="box-content d-flex justify-content-center">
                   <h4 class="title"><?php echo $video['video_title']?></h4>
                     <a style="color: black" href="video.php?vid=<?php echo $video['id']?>"><button class="play-btn"><i class="fas fa-play"></i></button></a>

                 </div>
              </div>
              </div>
            </div>
                <?php
            }

                ?>


        </div>
      </div>
    </section><!-- End Features Section -->
      <?php
      }


      echo pagination2($sql,'video_info',9);

      ?>
    <!-- ======= Screenshots Section ======= -->

  </main><!-- End #main -->
<?php
include 'footer.php';
?>