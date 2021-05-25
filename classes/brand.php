<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class brand
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);


        if(empty($brandName)){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
            $result = $this -> db -> insert($query);

            if($result){
                $alert ="<div class='alert alert-success'><h4>Thêm mới thành công</h4></div>";
                return $alert;
            }else{
                $alert ="<div class='alert alert-danger'><h4>Thêm mới thất bại</h4></div>";
                return $alert;
            }   
        }
    }

    public function show_brand(){
        $query = "SELECT * FROM tbl_brand ORDER BY brandId";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function getbrandbyId($id){
        $query = "SELECT * FROM tbl_brand WHERE brandId='$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_brand($brandName, $id){
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($brandName)){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId='$id'";
            $result = $this -> db -> update($query);

            if($result){
                $alert ="<div class='alert alert-success'><h4>Chỉnh sửa thành công</h4></div>";
                return $alert;
            }else{
                $alert ="<div class='alert alert-danger'><h4>Chỉnh sửa thất bại</h4></div>";
                return $alert;
            }   
        }
    }

    public function del_brand($id){
        $query = "DELETE FROM tbl_brand WHERE brandId='$id'";
        $result = $this -> db -> delete($query);
        if($result){
            $alert ="<div class='alert alert-success'><h4>Xoá thành công</h4></div>";
            return $alert;
        }else{
            $alert ="<div class='alert alert-danger'><h4>Xoá thất bại</h4></div>";
            return $alert;
        }   
    }
}

?>