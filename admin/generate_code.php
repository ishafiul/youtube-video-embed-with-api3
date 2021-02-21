<?php
include 'header.php';
global $conn;
$select_video_query = "SELECT * FROM video_info order by id desc ";
$select_video_result =mysqli_query($conn,$select_video_query);
$price_query = "SELECT * FROM price";
$price_result =mysqli_query($conn,$price_query);

/*$code_info_result = mysqli_query($conn,$code_info_query);*/
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    echo display_error();
    ?>
    <div class="row">
        <div class="col-md-3">
            <h4>Generate Code</h4>
            <form action="generate_code.php" method="post">
                <div class="mb-3">
                    <label for="uniqid" class="form-label">Uniq ID</label>
                    <input type="text" name="uniqid" class="form-control" id="uniqid" value="<?php echo uniqid();?>">
                </div>
                <div class="mb-3">
                    <label for="code_user" class="form-label">Code User Name</label>
                    <input type="text" name="code_user" class="form-control" id="code_user" value="">
                </div>
                <div class="mb-3">
                    <select name="select_video" class="form-control" aria-label="Default select example">
                        <option value="0" selected>All</option>
                        <?php
                        while($select_video_row = mysqli_fetch_assoc($select_video_result)){
                            ?>
                            <option value="<?php echo $select_video_row['id']?>"><?php echo $select_video_row['video_title']?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="select_plan" class="form-control" aria-label="Default select example">
                        <?php
                        while($price_row = mysqli_fetch_assoc($price_result)){
                            ?>
                            <option value="<?php echo $price_row['id']?>"><?php echo $price_row['price_title']?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" name="code_submit" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-9">
            <h4>All Videos</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Code ID</th>
                    <th scope="col">Permit video</th>
                    <th scope="col">Code</th>
                    <th scope="col">User</th>
                    <th scope="col">plan</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                function content($sql){
                    global $conn;
                    $result = mysqli_query($conn,$sql);
                while ($code_info_row = mysqli_fetch_assoc($result)){

                    ?>
                    <tr>
                        <th scope="row"><?php echo $code_info_row['id']?></th>
                        <td><?php
                            if($code_info_row['permit_video'] == 0){
                                echo 'ALL Videos';
                            }
                            else{
                                $vid = $code_info_row['permit_video'];
                                $vq= "select * From video_info where id ='$vid'  ";
                                $vr= mysqli_fetch_assoc(mysqli_query($conn,$vq));
                                echo $vr['video_title'];
                            }
                            ?></td>
                        <td><?php echo $code_info_row['uniq_code']?></td>
                        <td><?php echo $code_info_row['code_user']?></td>
                        <td><?php echo $code_info_row['validity_price_id']?></td>

                        <td>
                            <form action="generate_code.php" method="POST" class="col-4">
                                <input name="code_id" type="hidden" value="<?php echo $code_info_row['id']; ?>">
                                <button type="submit" style="border: 0; background-color: #F8F9FC;" name="delete_code" class="col-2"><i class="fas fa-trash-alt" style="color: red"></i></button>
                            </form>
                        </td>
                    </tr>
                <?PHP
                }

                ?>
                </tbody>
            </table>
            <?php
            }
            $sql = "SELECT * FROM `price` JOIN code WHERE price.id =code.validity_price_id ";

            echo pagination($sql,'code',10);

            ?>
            <!--<nav aria-label="Page navigation example">
                <ul class="pagination pagination-flush justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link circle circle-md" href="#"><span>1</span></a></li>
                    <li class="page-item"><a class="page-link circle circle-md" href="#"><span>2</span></a></li>
                    <li class="page-item disabled"><a class="page-link circle circle-md" href="#"><span>...</span></a></li>
                    <li class="page-item active"><a class="page-link circle circle-md" href="#"><span>28</span></a></li>
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a></li>
                </ul>
            </nav>-->
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php
include 'footer.php'
?>
