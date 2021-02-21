<?php
session_start();
// connect to database
include 'dbcon.inc.php';
global $conn;

// variable declaration
$f_name = "";
$email    = "";
$errors   = array();




// return user array from their id
function getUserById($id){
    global $conn;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// show error.
function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<h5>';
        foreach ($errors as $error){
            echo $error .'<br>';
        }
        echo '</h5>';
    }
}


// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}
// LOGIN USER
function login(){
    global $conn, $errors,$email;

    // grap form values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // make sure form is filled properly
    if (empty($email)) {
        array_push($errors, "E-mail is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin' && $logged_in_user['pass'] == $password)  {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: index.php');

            }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

//General: Site Name,Site Title,Site Sub Title,Description
if (isset($_POST['g_submit'])) {
    g_submit();
}
function g_submit(){
    global $conn, $errors;

    $s_name = $_POST['s_name'];
    $s_title = $_POST['s_title'];
    $s_sub_title = $_POST['s_sub_title'];
    $description = $_POST['description'];
    $query = "UPDATE site_info SET s_name='$s_name',s_title='$s_title',s_sub_title='$s_sub_title',description='$description' WHERE id='1'";
    $results = mysqli_query($conn, $query);
    if($results){
        array_push($errors, "General Settings Update Successfully");
    }
    else{
        array_push($errors, "ERROR Updating");
    }
}

//update banner
if (isset($_POST['banner_submit'])) {
    banner_submit();
}
function banner_submit(){
    global $conn, $errors;

    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['banner']['name'];
    $file_size = $_FILES['banner']['size'];
    $file_temp = $_FILES['banner']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $new_image_name = 'banner.png';
    $upload_to = "../assets/img/".$new_image_name;
    if (empty($file_name)) {
        array_push($errors, "Please Select any Image for Banner!");
    }elseif ($file_size >2048567) {
        array_push($errors, "Image Size should be less then 2MB for Banner!");

    } elseif (in_array($file_ext, $permited) === false) {
        array_push($errors, "You can upload only:-".implode(', ', $permited));

    } else{
        move_uploaded_file($file_temp, $upload_to);
        array_push($errors, "Banner Update Successfully!");
    }
}

//update logo
if (isset($_POST['logo_submit'])) {
    logo_submit();
}
function logo_submit(){
    global $conn, $errors;

    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $new_image_name = 'logo.png';
    $upload_to = "../assets/img/".$new_image_name;
    if (empty($file_name)) {
        array_push($errors, "Please Select any Image for Logo!");
    }elseif ($file_size >2048567) {
        array_push($errors, "Image Size should be less then 2MB for Logo!");

    } elseif (in_array($file_ext, $permited) === false) {
        array_push($errors, "You can upload only:-".implode(', ', $permited));

    } else{
        move_uploaded_file($file_temp, $upload_to);
        array_push($errors, "Logo Update Successfully!");
    }
}

//update favicon
if (isset($_POST['ficon_submit'])) {
    ficon_submit();
}
function ficon_submit(){
    global $conn, $errors;

    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['ficon']['name'];
    $file_size = $_FILES['ficon']['size'];
    $file_temp = $_FILES['ficon']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $new_image_name = 'ficon.png';
    $upload_to = "../assets/img/".$new_image_name;
    if (empty($file_name)) {
        array_push($errors, "Please Select any Image for Favicon!");
    }elseif ($file_size >2048567) {
        array_push($errors, "Image Size should be less then 2MB for Favicon!");

    } elseif (in_array($file_ext, $permited) === false) {
        array_push($errors, "You can upload only:-".implode(', ', $permited));

    } else{
        move_uploaded_file($file_temp, $upload_to);
        array_push($errors, "Favicon Update Successfully!");
    }
}

//update text 1
if (isset($_POST['txt1_submit'])) {
    txt1_submit();
}
function txt1_submit(){
    global $conn, $errors;

    $txt1_title = $_POST['txt1_title'];
    $txt1_description = $_POST['txt1_description'];
    $query = "UPDATE site_info SET txt1_title='$txt1_title',txt1_description='$txt1_description' WHERE id='1'";
    $results = mysqli_query($conn, $query);
    if($results){
        array_push($errors, "Text 1 Update Successfully");
    }
    else{
        array_push($errors, "ERROR Updating");
    }
}
//update text 2
if (isset($_POST['txt2_submit'])) {
    txt2_submit();
}
function txt2_submit(){
    global $conn, $errors;

    $txt2_title = $_POST['txt2_title'];
    $txt2_description = $_POST['txt2_description'];
    $query = "UPDATE site_info SET txt2_title='$txt2_title',txt2_description='$txt2_description' WHERE id='1'";
    $results = mysqli_query($conn, $query);
    if($results){
        array_push($errors, "Text 2 Update Successfully");
    }
    else{
        array_push($errors, "ERROR Updating");
    }
}
//update text 2
if (isset($_POST['txt3_submit'])) {
    txt3_submit();
}
function txt3_submit(){
    global $conn, $errors;

    $txt3_title = $_POST['txt3_title'];
    $txt3_description = $_POST['txt3_description'];
    $query = "UPDATE site_info SET txt3_title='$txt3_title',txt3_description='$txt3_description' WHERE id='1'";
    $results = mysqli_query($conn, $query);
    if($results){
        array_push($errors, "Text 3 Update Successfully");
    }
    else{
        array_push($errors, "ERROR Updating");
    }
}

if (isset($_POST['advideo_submit'])) {
    advideo_submit();
}
function advideo_submit(){
    global $conn, $errors;
    $url = $_POST['yt_link'];
    function getVideoID($url)
    {
        $queryString = parse_url($url,PHP_URL_QUERY);
        parse_str($queryString,$item);
        if(isset($item['v']) && strlen($item['v']) > 0)
        {
            return $item['v'];
        }
        else{
            return "";
        }
    }
    $apiKey = "AIzaSyDCUpKzoELms_nUDtLlFzCV8MZBLCeYp14";
    $apiURL = "https://www.googleapis.com/youtube/v3/videos?id=" . getVideoID($url) ."&key=" . $apiKey . "&part=snippet,contentDetails,statistics,status";
    $data   = json_decode(file_get_contents($apiURL));
    $title = $data->items[0]->snippet->title;
    $thumbnail = $data->items[0]->snippet->thumbnails->high->url;
    $video_code = getVideoID($url);
    $video_price = $_POST['video_price'];
    $Custom_Title =  $_POST['Custom_Title'];
    $paypal_link =  $_POST['paypal_link'];
    $query = "INSERT INTO video_info (video_title, video_thumbnail, video_price, video_code,yt_title,paypal_link)
VALUES ('$Custom_Title', '$thumbnail', '$video_price', '$video_code','$title','$paypal_link')";
    $result = mysqli_query($conn, $query);
    if($result){
        array_push($errors, "Upload Successfully");
        header('location: add_video.php');
    }
    else{
        array_push($errors, "Error Uploading Video");
    }

}

if (isset($_POST['delete_video'])) {
    delete_video();
}
function delete_video(){
    global $conn,$errors;
    $video_id = $_POST['video_id'];
    $query = "DELETE FROM video_info WHERE  id='$video_id'";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully Deleted");

    }
    else{
        array_push($errors, "Error Deleting Video");
    }
}

if (isset($_POST['code_submit'])) {
    code_submit();
}
function code_submit(){
    global $conn,$errors;
    $uniqid = $_POST['uniqid'];
    $code_user = $_POST['code_user'];
    $select_video = $_POST['select_video'];
    $select_plan = $_POST['select_plan'];
    $query = "Insert Into code (permit_video,validity_price_id,uniq_code,code_user) VALUES ('$select_video','$select_plan','$uniqid','$code_user')";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully Upload");

    }
    else{
        array_push($errors, "Error ");
    }
}

$code_query = "SELECT * FROM code";
$code_result = mysqli_query($conn,$code_query);
while ($code_row = mysqli_fetch_assoc($code_result)){
    $now_date = new DateTime (date("Y-m-d"));
    $create_date = new DateTime(date($code_row['create_date']));
    $code_id =$code_row['id'];
    if($code_row['validity_price_id'] !=0){
        $price_id = $code_row['validity_price_id'];
        $interval = $create_date->diff($now_date);
        $interval_days = $interval->days;
        $price_query = "SELECT * FROM price where id = '$price_id'";
        $price_row = mysqli_fetch_assoc(mysqli_query($conn,$price_query));
        if($interval_days>$price_row['validity_days']){
            $query = "DELETE FROM code WHERE  id='$code_id'";
            $result = mysqli_query($conn, $query);
            if ($result){
                array_push($errors, "Successfully Deleted");

            }
            else{
                array_push($errors, "Error Deleting");
            }
        }
    }

}
if (isset($_POST['delete_code'])) {
    delete_code();
}
function delete_code(){
    global $conn,$errors;
    $code_id = $_POST['code_id'];
    $query = "DELETE FROM code WHERE  id='$code_id'";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully Deleted");

    }
    else{
        array_push($errors, "Error Deleting");
    }
}
function pagination($sql,$tablename,$limit){
    global $conn,$errors;
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = $limit;
    $offset = ($pageno-1) * $no_of_records_per_page;



    $total_pages_sql = "SELECT COUNT(*) FROM ".$tablename;
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = $sql." LIMIT $offset, $no_of_records_per_page";
    //Previous
    content($sql);
    $html = '
<nav aria-label="Page navigation example">
      <ul class="pagination pagination-flush justify-content-center"><li class="page-item ';
    if ($pageno <= 1){
        $html.='disabled';
    }
     $html.='"><a class="page-link" href="';
    if($pageno <= 1){
        $html .='#';
    }
    else{
        $html .= "?pageno=".($pageno - 1);
    }
    $html.='">Previous</a></li>';
    for($i= 1; $i<=$total_pages; $i++){
        //$html .='<li class="page-item active"><a class="page-link" href="#"><span>'.$i.'</span></a></li>';
        $html .= '<li class="page-item ';
        if ($pageno == $i){
            $html.='active';
        }
        if($pageno == $i){
            $html.='"><a class="page-link" href="#">';
        }
        else{
            $html.='"><a class="page-link" href="?pageno='.$i.'"';
        }
        $html.='<span>'.$i.'</span></a></li>';

    }


    //Next
    $html .='<li class="page-item ';
    if($pageno >= $total_pages){
        $html.='disabled';
    }
    $html .='"><a class="page-link" href="';
    if($pageno >= $total_pages){
        $html .='#';
    }
    else{
        $html .= "?pageno=".($pageno + 1);
    }
    $html.='">Next</a></li>';

    $html.='</ul></nav>';
    echo $html;
}

function pagination2($sql,$tablename,$limit){
    global $conn,$errors;
    if(isset($_GET['datefirsttolast'])){
        $url ='?datefirsttolast=true&';
    }
    elseif(isset($_GET['pricelowtohigh'])){
        $url ='?pricelowtohigh=true&';
    }
    elseif(isset($_GET['pricehightolow'])){
        $url ='?pricehightolow=true&';
    }
    else{
        $url ='?';
    }
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = $limit;
    $offset = ($pageno-1) * $no_of_records_per_page;



    $total_pages_sql = "SELECT COUNT(*) FROM ".$tablename;
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = $sql." LIMIT $offset, $no_of_records_per_page";
    //Previous
    content($sql);
    $html = '
<nav aria-label="Page navigation example">
      <ul class="pagination pagination-flush justify-content-center"><li class="page-item ';
    if ($pageno <= 1){
        $html.='disabled';
    }
    $html.='"><a class="page-link" href="';
    if($pageno <= 1){
        $html .=$url.'#features';
    }
    else{
        $html .= $url."pageno=".($pageno - 1)."#features";
    }
    $html.='">Previous</a></li>';
    for($i= 1; $i<=$total_pages; $i++){
        //$html .='<li class="page-item active"><a class="page-link" href="#"><span>'.$i.'</span></a></li>';
        $html .= '<li class="page-item ';
        if ($pageno == $i){
            $html.='active';
        }
        if($pageno == $i){
            $html.='"><a class="page-link" href="#features">';
        }
        else{
            $html.='"><a class="page-link" href="'.$url.'pageno='.$i.'#features"';
        }
        $html.='<span>'.$i.'</span></a></li>';

    }


    //Next
    $html .='<li class="page-item ';
    if($pageno >= $total_pages){
        $html.='disabled';
    }
    $html .='"><a class="page-link" href="';
    if($pageno >= $total_pages){
        $html .=$url.'#features';
    }
    else{
        $html .= $url."pageno=".($pageno + 1)."#features";
    }
    $html.='">Next</a></li>';

    $html.='</ul></nav>';
    echo $html;
}


if (isset($_POST['price1_submit'])) {
    price1_submit();
}
function price1_submit(){
    global $conn,$errors;
    $price_title = $_POST['price1_title'];
    $price_value = $_POST['price1_value'];
    $price_validity_days = $_POST['price1_validity_days'];
    $query = "Update price set price_value='$price_value', price_title='$price_title', validity_days='$price_validity_days' where id =1";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully");

    }
    else{
        array_push($errors, "Error");
    }
}

if (isset($_POST['price2_submit'])) {
    price2_submit();
}
function price2_submit(){
    global $conn,$errors;
    $price_title = $_POST['price2_title'];
    $price_value = $_POST['price2_value'];
    $price_validity_days = $_POST['price2_validity_days'];
    $query = "Update price set price_value='$price_value', price_title='$price_title', validity_days='$price_validity_days' where id =2";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully");

    }
    else{
        array_push($errors, "Error");
    }
}


if (isset($_POST['price3_submit'])) {
    price3_submit();
}
function price3_submit(){
    global $conn,$errors;
    $price_title = $_POST['price3_title'];
    $price_value = $_POST['price3_value'];
    $price_validity_days = $_POST['price3_validity_days'];
    $query = "Update price set price_value='$price_value', price_title='$price_title', validity_days='$price_validity_days' where id =3";
    $result = mysqli_query($conn, $query);
    if ($result){
        array_push($errors, "Successfully");

    }
    else{
        array_push($errors, "Error");
    }
}

function sort_date(){
    if(isset($_GET['datefirsttolast'])){
       return "SELECT * FROM `video_info` order by id asc ";
    }
    elseif (isset($_GET['pricelowtohigh'])){
        return "SELECT * FROM `video_info` order by video_price asc ";
    }
    elseif (isset($_GET['pricehightolow'])){
        return "SELECT * FROM `video_info` order by video_price desc ";
    }
    else{
        return "SELECT * FROM `video_info` order by id desc ";
    }
}
if (isset($_POST['price3_submit'])) {
    price3_submit();
}


if (isset($_POST['editvideo_submit'])) {
    editvideo_submit();
}
function editvideo_submit(){
    global $conn, $errors;
    $url = $_POST['yt_link'];
    $paypal_link = $_POST['paypal_link'];
    $vid = $_POST['id'];

    $Custom_Title =  $_POST['Custom_Title'];
    function getVideoID($url)
    {
        $queryString = parse_url($url,PHP_URL_QUERY);
        parse_str($queryString,$item);
        if(isset($item['v']) && strlen($item['v']) > 0)
        {
            return $item['v'];
        }
        else{
            return "";
        }
    }
    $apiKey = "AIzaSyDCUpKzoELms_nUDtLlFzCV8MZBLCeYp14";
    $apiURL = "https://www.googleapis.com/youtube/v3/videos?id=" . getVideoID($url) ."&key=" . $apiKey . "&part=snippet,contentDetails,statistics,status";
    $data   = json_decode(file_get_contents($apiURL));
    $title = $data->items[0]->snippet->title;
    $thumbnail = $data->items[0]->snippet->thumbnails->high->url;
    $video_code = getVideoID($url);
    $video_price = $_POST['video_price'];
    $query = "UPDATE video_info SET video_title='$Custom_Title', video_thumbnail='$thumbnail', video_price='$video_price', video_code='$video_code',yt_title='$title',paypal_link='$paypal_link' where id='$vid'";
    $result = mysqli_query($conn, $query);
    if($result){
        array_push($errors, "Upload Successfully");
        header('location: add_video.php');
    }
    else{
        array_push($errors, "Error Uploading Video");
    }

}
if (isset($_POST['get_video'])) {
    get_video();
}
function get_video(){
    global $conn, $errors;
    $vid = $_POST['id'];
    $code = $_POST['code'];
    $query = "SELECT * FROM code where uniq_code='$code'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($row['permit_video'] == 0 || $row['permit_video'] == $vid){
            $_SESSION['active'] = time();
            $_SESSION['expire'] = $_SESSION['active'] + (30) ;
        }
        else{
            array_push($errors, "You Dont Have Access to This Video");
        }
    }
    else{
        array_push($errors, "Wrong Password");
    }
}