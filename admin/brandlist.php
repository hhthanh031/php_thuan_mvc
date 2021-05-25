<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/brand.php'?>

<?php
$brand = new brand();
if(isset($_GET['delid'])){
  $id = $_GET['delid'];
  $delbrand = $brand->del_brand($id);
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($delbrand)){
      echo $delbrand;          
    }
    ?> 
    <h1>
      THƯƠNG HIỆU
      <a class="btn btn-app" href="brandadd.php">
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
                  <th>Tên thương hiệu</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $show_brand = $brand->show_brand();
                if($show_brand){
                  $i = 0;
                  while($result = $show_brand->fetch_assoc()){
                    $i++;
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $result['brandName']; ?></td>
                      <td>
                        <a href="brandedit.php?brandId=<?php echo $result['brandId']?>" class="btn btn-primary btn-flat">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?delid=<?php echo $result['brandId']?>" class="btn btn-danger btn-flat">Xoá</a>
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