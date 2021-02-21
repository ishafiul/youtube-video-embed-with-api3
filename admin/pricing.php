<?php
include 'header.php';
global $conn;
$row1 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * from price where id=1'));
$row2 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * from price where id=2'));
$row3 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * from price where id=3'));

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    echo display_error();
    ?>
    <div class="row">
        <div class="col-md-4">
            <h4>Price 1 Settings </h4>
            <form method="post" action="pricing.php">
                <div class="mb-3">
                    <label for="price1_title" class="form-label">Title</label>
                    <input type="text" name="price1_title" class="form-control" id="price1_title" value="<?php echo $row1['price_title'];?>">
                </div>
                <div class="mb-3">
                    <label for="price1_value" class="form-label">Price </label>
                    <input type="number" step="0.01" name="price1_value" class="form-control" id="price1_value" value="<?php echo $row1['price_value'];?>">
                </div>
                <div class="mb-3">
                    <label for="price1_validity_days" class="form-label">Active Status(Days)</label>
                    <input type="number" name="price1_validity_days" class="form-control" id="price1_validity_days" value="<?php echo $row1['validity_days'];?>">
                </div>
                <input type="submit" name="price1_submit" class="btn btn-primary">
            </form>
            <hr>
        </div>
        <div class="col-md-4">
            <h4>Price 2 Settings </h4>
            <form method="post" action="pricing.php">
                <div class="mb-3">
                    <label for="price2_title" class="form-label">Title</label>
                    <input type="text" name="price2_title" class="form-control" id="price2_title" value="<?php echo $row2['price_title'];?>">
                </div>
                <div class="mb-3">
                    <label for="price1_value" class="form-label">Price </label>
                    <input type="number" step="0.01" name="price2_value" class="form-control" id="price2_value" value="<?php echo $row2['price_value'];?>">
                </div>
                <div class="mb-3">
                    <label for="price2_validity_days" class="form-label">Active Status(Days)</label>
                    <input type="number" name="price2_validity_days" class="form-control" id="price2_validity_days" value="<?php echo $row2['validity_days'];?>">
                </div>
                <input type="submit" name="price2_submit" class="btn btn-primary">
            </form>
            <hr>
        </div>
        <div class="col-md-4">
            <h4>Price 3 Settings </h4>
            <form method="post" action="pricing.php">
                <div class="mb-3">
                    <label for="price3_title" class="form-label">Title</label>
                    <input type="text" name="price3_title" class="form-control" id="price3_title" value="<?php echo $row3['price_title'];?>">
                </div>
                <div class="mb-3">
                    <label for="price3_value" class="form-label">Price </label>
                    <input type="number" step="0.01"name="price3_value" class="form-control" id="price3_value" value="<?php echo $row3['price_value'];?>">
                </div>
                <div class="mb-3">
                    <label for="price3_validity_days" class="form-label">Active Status(Days)</label>
                    <input type="number" name="price3_validity_days" class="form-control" id="price3_validity_days" value="<?php echo $row3['validity_days'];?>">
                </div>
                <input type="submit" name="price3_submit" class="btn btn-primary">
            </form>
            <hr>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
include 'footer.php'
?>
