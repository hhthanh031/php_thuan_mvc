<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
  $pd = new product();
  $fm = new Format();
  if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_product($id);
    }
?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($delpro)){
      echo $delpro;
    }
    ?> 
    <h1>
      SẢN PHẨM
      <a class="btn btn-app" href="productadd.php">
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
            <h3 class="box-title">Danh sách sản phẩm</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Danh mục</th>
                  <th>Thương hiệu</th>
                  <!-- <th>Mô tả</th> -->
                  <th>Loại</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $pdlist = $pd->show_product();
                if($pdlist){
                  // $i = 0;
                  while($result = $pdlist->fetch_assoc()){
                    // $i++;
                    ?>
                    <tr class="odd gradeX">
                      <td><?php echo $result['productId'] ?></td>
                      <td><?php echo $result['productName'] ?></td>
                      <td><?php echo $result['price'] ?></td>
                      <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                      <td><?php echo $result['catName'] ?></td>
                      <td><?php echo $result['brandName'] ?></td>
                      <!-- <td><?php 

                      echo $fm->textShorten($result['product_desc'], 50);

                      ?></td> -->
                      <td><?php 
                      if($result['type']==0){
                        echo 'Nổi bật';
                      }else{
                        echo 'Không nổi bật';
                      }

                      ?></td>

                      <td><a href="productedit.php?productid=<?php echo $result['productId'] ?>" class="btn btn-primary btn-flat">Sửa</a> 
                          <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?productid=<?php echo $result['productId'] ?>" class="btn btn-danger btn-flat">Xoá</a></td>
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