<?php

use App\Models\Page;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    //$page=new page();
    //lấy từ form
    $page->name = $_POST['name'];
    $page->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $page->detail = $_POST['detail'];
    $page->price = $_POST['price'];
    $page->price_sale = $_POST['price_sale'];
    $page->category_id = $_POST['category_id'];
    $page->brand_id = $_POST['brand_id'];
    $page->description = $_POST['description'];
    $page->status = $_POST['status'];
    $page->qty = $_POST['qty'];
     //Xử lí uploadfile
     if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/page/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $page->image =$filename;
        }
    }
    //tư sinh ra
    $page->created_at = date('Y-m-d H:i:s');
    $page->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($page);
    //luu vao csdl
    //ínet
    $page->save();
    //
    header("location:index.php?option=page");
}