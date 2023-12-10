<?php 
include "../../../config.php";
if(isset($_POST["lichranh"])){
    $thiss = $_POST["lichranh"];
    foreach ($thiss as $ca) {
        // Tách giá trị thành mã ca và thứ
        list($maca, $thu) = explode("_", $ca);

        // Thực hiện câu lệnh INSERT vào cơ sở dữ liệu
        
    }
}
?>