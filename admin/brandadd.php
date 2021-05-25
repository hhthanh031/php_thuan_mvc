<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/brand.php' ?>

<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $brandName = $_POST['brandName'];

  $insert_Brand = $brand->insert_brand($brandName);
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">



    <?php
    if(isset($insert_Brand)){
      echo $insert_Brand;          
    }
    ?>
    
    

    <h1>
      THÊM MỚI THƯƠNG HIỆU
      <a class="btn btn-app" href="brandlist.php">
        <i class="fa fa-folder-open"></i> Danh sách thương hiệu
      </a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Nhập thông tin thương hiệu</h3>
        
        
      </div>
      <!-- /.box-header -->
      <form role="form" action="brandadd.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên thương hiệu</label>
            <input type="type" name="brandName" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='brandlist.php';">Danh sách thương hiệu</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button>

        </div>
      </form>

    </div>
    <!-- /.box -->

  </div>

  <?php include 'inc/footer.php' ?>