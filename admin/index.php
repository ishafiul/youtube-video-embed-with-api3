<?php
include 'header.php'
?>
                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <h2>
                        <?php
                        global $conn;
                        echo display_error();
                        $query = "SELECT * FROM site_info Where id='1'";
                        $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
                        ?>
                    </h2>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>General Settings </h4>
                            <form action="index.php" method="post">
                                <div class="mb-3">
                                    <label for="s_name" class="form-label">Site Name</label>
                                    <input type="text" name="s_name" class="form-control" id="s_name" value="<?php echo $row['s_name'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="s_title" class="form-label">Site Title</label>
                                    <input type="text" name="s_title" class="form-control" id="s_title" value="<?php echo $row['s_title'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="s_sub_title" class="form-label">Site Sub Title</label>
                                    <input type="text" name="s_sub_title" class="form-control" id="s_sub_title" value="<?php echo $row['s_sub_title'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description </label>
                                    <textarea type="text" name="description" class="form-control" id="description"><?php echo $row['description'];?> </textarea>
                                </div>
                                <input type="submit" name="g_submit" class="btn btn-primary">
                                <hr>
                                
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Text 1 Settings </h4>
                                    <form method="post" action="index.php">
                                        <div class="mb-3">
                                            <label for="txt1_title" class="form-label">Text 1 Title</label>
                                            <input type="text" name="txt1_title" class="form-control" id="txt1_title" value="<?php echo $row['txt1_title'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="txt1_description" class="form-label">Description </label>
                                            <textarea type="text" name="txt1_description" class="form-control" id="txt1_description" > <?php echo $row['txt1_description'];?></textarea>
                                        </div>
                                        <input type="submit" name="txt1_submit" class="btn btn-primary">
                                    </form>
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <form method="post" action="index.php">
                                        <h4>Text 2 Settings </h4>
                                        <div class="mb-3">
                                            <label for="txt2_title" class="form-label">Text 2 Title</label>
                                            <input type="text" name="txt2_title" class="form-control" id="txt2_title" value="<?php echo $row['txt2_title'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="txt2_description" class="form-label">Description </label>
                                            <textarea type="text" name="txt2_description" class="form-control" id="txt2_description" ><?php echo $row['txt2_description'];?> </textarea>
                                        </div>
                                        <input type="submit" name="txt2_submit" class="btn btn-primary">
                                    </form>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <form method="post" action="index.php">
                                        <h4>Text 3 Settings </h4>
                                        <div class="mb-3">
                                            <label for="txt3_title" class="form-label">Text 3 Title</label>
                                            <input type="text" name="txt3_title" class="form-control" id="txt3_title" value="<?php echo $row['txt3_title'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="txt3_description" class="form-label">Description </label>
                                            <textarea type="text" name="txt3_description" class="form-control" id="txt3_description" > <?php echo $row['txt3_description'];?></textarea>
                                        </div>
                                        <input type="submit" name="txt3_submit" class="btn btn-primary">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Update Logo </h4>
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <img src="../assets/img/logo.png" alt="logo" width="100px" height="100px">
                                        </div>
                                        <div class="col-md-10">
                                            <form action="index.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="logo" class="form-label">Logo</label>
                                                    <input type="file" name="logo" class="form-control" id="logo" >
                                                </div>
                                                <input type="submit" name="logo_submit" class="btn btn-primary">
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Update Favicon </h4>
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <img src="../assets/img/ficon.png" alt="logo" width="50px" height="50px">
                                        </div>
                                        <div class="col-md-10">
                                            <form action="index.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="ficon" class="form-label">Favicon </label>
                                                    <input type="file" name="ficon" class="form-control" id="ficon" >
                                                </div>

                                                <input type="submit" name="ficon_submit" class="btn btn-primary">
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Update Banner </h4>
                            <img src="../assets/img/banner.png" alt="" width="500px">
                            <div class="col-md-6">
                                <form action="index.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="file" name="banner" class="form-control" id="banner" >
                                    </div>
                                    <input type="submit" name="banner_submit" class="btn btn-primary">
                                </form>
                        </div>

                        </div>
                    </div>
                </div>
<br>

                <!-- /.container-fluid -->
<?php
include 'footer.php'
?>
