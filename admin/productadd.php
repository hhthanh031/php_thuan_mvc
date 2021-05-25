<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $insertProduct = $pd->insert_product($_POST,$_FILES);
    }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <?php

    if(isset($insertProduct)){
      echo $insertProduct;
    }

    ?> 
    
    <h1>
      THÊM MỚI SẢN PHẨM
      <a class="btn btn-app" href="productlist.php">
        <i class="fa fa-folder-open"></i> Danh sách sản phẩm
      </a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Nhập thông tin sản phẩm</h3>

          
        </div>
        <!-- /.box-header -->

        <form action="productadd.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="type" name="productName" class="form-control"  placeholder="Nhập tên sản phẩm">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="type" name="price" class="form-control"  placeholder="Nhập giá sản phẩm">
              </div>

              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              
              <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control select2 select2-hidden-accessible" name="category" style="width: 100%;">
                  <option>-----Chọn danh mục sản phẩm-----</option>
                  <?php
                  $cat = new category();
                  $catlist = $cat->show_category();

                  if($catlist){
                    while($result = $catlist->fetch_assoc()){
                     ?>

                     <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <!-- /.form-group -->
              <div class="form-group">
                <label>Thương hiệu</label>
                <select class="form-control select2 select2-hidden-accessible" name="brand" style="width: 100%;">
                  <option>-----Chọn thương hiệu sản phẩm-----</option>
                  <?php
                  $brand = new brand();
                  $brandlist = $brand->show_brand();

                  if($brandlist){
                    while($result = $brandlist->fetch_assoc()){
                     ?>

                     <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-control select2 select2-hidden-accessible" name="type" style="width: 100%;">
                  <option>-----Chọn loại sản phẩm-----</option>
                  <option value="0">Nổi bật</option>
                  <option value="1">Không nổi bật</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Mô tả</label>
                  <textarea id="editor1" name="product_desc" rows="10" cols="80">

                  </textarea>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='productlist.php';">Danh sách sản phẩm</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>

        </form>
      </div>
    <!-- /.box -->

  </div>

  <?php include 'inc/footer.php' ?>