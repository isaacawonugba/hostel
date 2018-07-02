<?php
require_once("Student.php");
class Hostel{
    private $conn;
    function __construct(){
        $stud = new Student();
        $this->conn = $stud->connect();
    }
    function loadHostels(){
        $html = "<option selected></option>";
        $sql = "SELECT id, hostel FROM hostels";
        $res = mysqli_query($this->conn, $sql);
        while($rows = mysqli_fetch_array($res)){
            $html .= "<option value='".$rows['id']."'>".$rows['hostel']."</option>"; 
        }
        return $html;
    }

    function loadBlocksByHostelID($hid){
        $html = "<option selected></option>";
        $sql = "SELECT id, blkname FROM blocks WHERE hostel_id = '$hid'";
        $res = mysqli_query($this->conn, $sql);
        while($rows = mysqli_fetch_array($res)){
            $html .= "<option value='".$rows['id']."'>".$rows['blkname']."</option>"; 
        }
        return $html;
    }
}

?>