<?php include'inc/header.php' ?>
<?php include'inc/sidebar.php' ?>        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <?php
                    $product_feathered = $product->getproduct_feathered();
                    if($product_feathered){
                        while($result = $product_feathered->fetch_assoc()){

                            ?>
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="admin/uploads/<?php echo $result['image'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a style="text-decoration: none;" href="details.php?proid=<?php echo $result['productId'] ?>"><?php echo $result['productName'] ?></a></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php echo $fm->format_currency($result['price'])." "."VNĐ" ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="details.php">Thêm vào giỏ hàng</a></div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

                </div>
            </div>
        </section>
<?php include'inc/footer.php' ?>