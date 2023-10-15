<?php


use App\Models\Contact;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $contact = new Contact();
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];



    $contact->status = $_POST['status'];


    $contact->created_at = date('Y-m-d h:i:s');
    $contact->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($contact);

    $contact->save();

    header("location:index.php?option=contact");
}
