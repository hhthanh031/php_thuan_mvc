<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php' ?>

<?php
$cat = new category();
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $id = $_GET['catId'];
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $catName = $_POST['catName'];

        $updateCat = $cat->update_category($catName, $id);
    }

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($updateCat)){
      echo $updateCat;          
    }
    ?>
    <h1>
      CHỈNH SỬA DANH MỤC
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

      <?php
      $get_cate_name = $cat->getcatbyId($id);
      if($get_cate_name){
        while($result = $get_cate_name->fetch_assoc()){

          ?>

      <form action="" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input type="type" name="catName" value="<?php echo $result['catName'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='catelist.php';">Danh sách danh mục</button> 
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