<?php

use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_POST['THEM']))
{
    $order = new order();
    // lay tu from
    $order->user_id = $_POST['user_id'];
    $order->status = $_POST['status'];
    //xu ly up load
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/order/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (in_array($extension,['jpg','jpeg','png','gif','webp']))
        {   
            $filename=$order->slug . "." . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $order->image = $filename;
        }
    }
    // tu sinh ra 
    $order->created_at = date('Y-m-d H:i:s');
    $order->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($order);
    //luu vao csdl
    //insert into order
    $order->save();
    //chuyen huong ve index 
    header ("location:index.php?option=order");
}