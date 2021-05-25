<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data,$files){


        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name ==""){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Thêm mới thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Thêm mới thất bại</h4></div>";
                return $alert;
            }
        }
    }

    public function show_product(){
            // $query = "

            // SELECT p.*,c.catName, b.brandName

            // FROM tbl_product as p,tbl_category as c, tbl_brand as b where p.catId = c.catId 

            // AND p.brandId = b.brandId 

            // order by p.productId desc";

            $query = "

            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

            order by tbl_product.productId desc";

            // $query = "SELECT * FROM tbl_product order by productId desc";

            $result = $this->db->select($query);
            return $result;
        }

    public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

    public function update_product($data,$files,$id){

        
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
                $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if ($file_size > 1000000) {

                     $alert = "<div class='alert alert-danger'><h4>Dung lượng ảnh phải nhỏ hơn 2MB!</h4></div>";
                    return $alert;
                    } 
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";    
                    $alert = "<div class='alert alert-danger'><h4>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</h4></div>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category', 
                    type = '$type', 
                    price = '$price', 
                    image = '$unique_image',
                    product_desc = '$product_desc'
                    WHERE productId = '$id'";
                    
                }else{
                    //Nếu người dùng không chọn ảnh
                    $query = "UPDATE tbl_product SET

                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category', 
                    type = '$type', 
                    price = '$price', 
                    
                    product_desc = '$product_desc'

                    WHERE productId = '$id'";
                    
                }
                $result = $this->db->update($query);
                    if($result){
                        $alert = "<div class='alert alert-success'><h4>Cập nhật sản phẩm thành công</h4></div>";
                        return $alert;
                    }else{
                        $alert = "<div class='alert alert-danger'><h4>Cập nhật sản phẩm không thành công</h4></div>";
                        return $alert;
                    }
                
            }

        }

    public function del_product($id){
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá sản phẩm thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá sản phẩm không thành công</h4></div>";
                return $alert;
            }
            
        }


        // END BACK END
        
        //START FRONT-END
        //
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '0' order by RAND() LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = "

            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        } 

}

?>