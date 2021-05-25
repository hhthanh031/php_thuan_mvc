<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php'?>

<?php
    $cat = new category();
    if(isset($_GET['delid'])){
      $id = $_GET['delid'];
      $delcat = $cat->del_category($id);
    }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($delcat)){
      echo $delcat;          
    }
    ?> 
    <h1>
      DANH MỤC
      <a class="btn btn-app" href="cateadd.php">
        <i class="fa fa-edit"></i> Thêm mới
      </a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Danh sách danh mục</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên danh mục</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $show_cate = $cat->show_category();
                  if($show_cate){
                    $i = 0;
                    while($result = $show_cate->fetch_assoc()){
                    $i++;
                ?>

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $result['catName']; ?></td>
                  <td>
                    <a href="catedit.php?catId=<?php echo $result['catId']?>" class="btn btn-primary btn-flat">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?delid=<?php echo $result['catId']?>" class="btn btn-danger btn-flat">Xoá</a>
                  </td>
                </tr>
                
                <?php
                  }
                }
                ?>

              </tbody>
              
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


<?php include 'inc/footer.php' ?>