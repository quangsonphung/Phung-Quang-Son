
<?php
use App\Models\product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Brand;


//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$list_category = Category::where('status','!=',0)->orderBy('Created_at','DESC')->get();
$list_brand = Brand::where('status','!=',0)->orderBy('Created_at','DESC')->get();

$category_id_html ="";
$brand_id_html ="";

foreach ($list_category as $category)
{
   $category_id_html .="<option value ='$category->id'>$category->name</option>";
}
foreach ($list_brand as $brand)
{
   $brand_id_html .="<option value ='$brand->id'>$brand->name</option>";
}

?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm mới bài viết</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=post&cat=process" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button type="submit" class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm bai VIET
                     </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                           <label>Tiêu đề bài viết (*)</label>
                           <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Chi tiết (*)</label>
                           <textarea name="detail" rows="5" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Chủ đề (*)</label>
                           <select name="topic_id" class="form-control">
                              <option value="">None</option>
                              <option value="1">Tên danh mục</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->

      <?php require_once "../views/backend/footer.php";?>
      