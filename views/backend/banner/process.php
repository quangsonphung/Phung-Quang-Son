<?php


use App\Models\Banner;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $banner = new Banner();
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];

    $banner->status = $_POST['status'];


    $banner->created_at = date('Y-m-d h:i:s');
    $banner->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($banner);

    $banner->save();

    header("location:index.php?option=banner");
}
