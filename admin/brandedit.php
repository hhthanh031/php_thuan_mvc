<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/brand.php' ?>

<?php
$brand = new brand();
if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
  echo "<script>window.location = 'brandlist.php'</script>";
} else {
  $id = $_GET['brandId'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $brandName = $_POST['brandName'];

  $updateBrand = $brand->update_brand($brandName, $id);
}

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($updateBrand)){
      echo $updateBrand;          
    }
    ?>
    <h1>
      CHỈNH SỬA THƯƠNG HIỆU
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

      <?php
      $get_brand_name = $brand->getbrandbyId($id);
      if($get_brand_name){
        while($result = $get_brand_name->fetch_assoc()){

          ?>

          <form action="" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên thương hiệu</label>
                <input type="type" name="brandName" value="<?php echo $result['brandName'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="button" class="btn btn-default" onclick="window.location.href='brandlist.php';">Danh sách danh mục</button> 
              <input type="submit" class="btn btn-primary" name="submit" Value="Lưu chỉnh sửa" />
            </div>
          </form>

          <?php
        }
      }
      ?>

    </div>
    <!-- /.box -->

  </div>

  <?php include 'inc/footer.php' ?>