<?php

use App\Models\Post;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $post=new Post();
    //lấy từ form
    $post->topic_id = $_POST['topic_id'];
    $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['id']);
    $post->title = $_POST['title'];
    $post->status = $_POST['status'];
     //Xử lí uploadfile
     if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/post/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $post->image =$filename;
        }
    }
    //tư sinh ra
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = (isset($_SESSION['topic_id']))? $_SESSION['topic_id'] : 1;
    var_dump($post);
    //luu vao csdl
    //isset
    $post->save();
    //
    header("location:index.php?option=post");
}