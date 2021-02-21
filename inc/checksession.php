<?php
if(!isset($_SESSION['user']) && !isset($_SESSION['success']))
{
    header('Location:login.php');
}

?>
