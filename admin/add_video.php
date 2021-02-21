<?php
include 'header.php';
global $conn;

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    echo display_error();
    ?>
 <div class="row">
     <div class="col-md-3">
         <h4>Add New Video</h4>
         <form action="add_video.php" method="post">
             <div class="mb-3">
                 <label for="yt_link" class="form-label">Video Link (Youtube) </label>
                 <input type="text" name="yt_link" class="form-control" id="yt_link" >
             </div>
             <div class="mb-3">
                 <label for="Custom_Title " class="form-label">Custom Title </label>
                 <input type="text" name="Custom_Title" class="form-control" id="Custom_Title" >
             </div>
             <div class="mb-3">
                 <label for="video_price" class="form-label">Price </label>
                 <input type="number" step="0.01" name="video_price" class="form-control" id="video_price" >
             </div>
             <div class="mb-3">
                 <label for="paypal_link " class="form-label">Custom Title </label>
                 <input type="text" name="paypal_link" class="form-control" id="paypal_link" >
             </div>
             <input type="submit" name="advideo_submit" class="btn btn-primary">
         </form>
     </div>
     <div class="col-md-9">
         <h4>All Videos</h4>
         <table class="table">
             <thead>
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">YT Title</th>
                 <th scope="col">Custom Title</th>
                 <th scope="col">Thumbnail Link</th>
                 <th scope="col">Video YT Code</th>
                 <th scope="col">Price</th>
                 <th scope="col">Action</th>
             </tr>
             </thead>
             <tbody>
             <?php
             function content($sql){
             global $conn;
             //$query = "SELECT * FROM video_info LIMIT '$offset','$limit' ";
             $result = mysqli_query($conn,$sql);
             while ($row = mysqli_fetch_assoc($result)){

             ?>
             <tr>
                 <th scope="row"><?php echo $row['id']?></th>
                 <td><?php echo $row['yt_title']?></td>
                 <td><?php echo $row['video_title']?></td>
                 <td><img src="<?php echo $row['video_thumbnail']?>" alt="" width="100px"></td>
                 <td><?php echo $row['video_code']?></td>
                 <td><?php echo $row['video_price']?></td>
                 <td><div class="row">
                         <div class="col-6"><a class="text-primary" href="edit_video.php?vid=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a></div>
                         <div class="col-6 ">
                             <form action="add_video.php" method="POST" class="col-4">
                                 <input name="video_id" type="hidden" value="<?php echo $row['id']; ?>">
                                 <button style="border: 0; background-color: #F8F9FC;" name="delete_video" class="col-2"><i class="fas fa-trash-alt" style="color: red"></i></button>
                             </form></div>
                     </div></td>
             </tr>
             <?php
                 }

             ?>
             </tbody>
         </table>
         <?php
         }
         $sql = "SELECT * FROM video_info order by id desc";
         echo pagination($sql,'video_info',10);
         ?>
     </div>
 </div>
</div>

<!-- /.container-fluid -->
<?php

include 'footer.php'
?>
