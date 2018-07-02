<?php
if(isset($_POST['hostel'])){
    require_once("Hostel.php");
    $hostelID = $_POST['hostel'];
    $hos = new Hostel();
    echo $hos->loadBlocksByHostelID($hostelID);
}
?>