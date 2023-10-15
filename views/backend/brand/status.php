<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);