<?php

use App\Models\User;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $user=new User();
    //lấUser->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    
   
 
    $user->name = $_POST['name'];
    $user->status = $_POST['status'];
    
     //Xử lí uploadfile
     if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($iser);
    //luu vao csdl
    //ínet
    $user->save();
    //
    header("location:index.php?option=User");
}