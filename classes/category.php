<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);


        if(empty($catName)){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
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

    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY catId";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function getcatbyId($id){
        $query = "SELECT * FROM tbl_category WHERE catId='$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_category($catName, $id){
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($catName)){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId='$id'";
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

    public function del_category($id){
        $query = "DELETE FROM tbl_category WHERE catId='$id'";
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