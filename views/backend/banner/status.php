<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner = Banner::Find($id);
if ($banner == null) {
}
