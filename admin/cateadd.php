<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php' ?>

<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $catName = $_POST['catName'];

  $insert_category = $cat->insert_category($catName);
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">



    <?php
    if(isset($insert_category)){
      echo $insert_category;          
    }
    ?>
    
    

    <h1>
      THÊM MỚI DANH MỤC
      <a class="btn btn-app" href="catelist.php">
        <i class="fa fa-folder-open"></i> Danh sách danh mục
      </a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Nhập thông tin danh mục</h3>
        
        
      </div>
      <!-- /.box-header -->
      <form role="form" action="cateadd.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input type="type" name="catName" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='catelist.php';">Danh sách danh mục</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button>

        </div>
      </form>

    </div>
    <!-- /.box -->

  </div>

  <?php include 'inc/footer.php' ?>