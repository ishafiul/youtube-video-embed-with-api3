<?php
include 'header.php';
global $conn;
$id='';
if(isset($_GET['vid'])){
    $id = $_GET['vid'];

}
$query = "SELECT * FROM video_info where id ='$id'";
$row = mysqli_fetch_assoc(mysqli_query($conn,$query));
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Add New Video</h4>
    <form action="edit_video.php" method="post">
        <div class="mb-3">
            <label for="yt_link" class="form-label">Video Link (Youtube) </label>
            <input type="text" name="yt_link" class="form-control" id="yt_link" value="https://www.youtube.com/watch?v=<?php echo $row['video_code'] ?>">
        </div>
        <div class="mb-3">
            <label for="video_price" class="form-label">Price </label>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <input type="number" step="0.01" name="video_price" class="form-control" id="video_price" value="<?php echo $row['video_price'] ?>" >
        </div>
        <input name="editvideo_submit" type="submit" class="btn btn-primary">
    </form>
</div>
<!-- /.container-fluid -->*
<?php
include 'footer.php'
?>
