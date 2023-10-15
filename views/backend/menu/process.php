<?php

use App\Models\Menu;
use App\Libraries\MyClass;

if (isset($_POST['THEM']))
{
    $menu = new menu();
    // lay tu from
    $menu->name = $_POST['name'];
   
    $menu->status = $_POST['status'];
    //xu ly up load
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/menu/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (in_array($extension,['jpg','jpeg','png','gif','webp']))
        {   
            $filename=$menu->slug . "." . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $menu->image = $filename;
        }
    }
    // tu sinh ra 
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($menu);
    //luu vao csdl
    //insert into menu
    $menu->save();
    //chuyen huong ve index 
    header ("location:index.php?option=menu");
}