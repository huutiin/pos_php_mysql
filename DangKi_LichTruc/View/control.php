<?php
    if (isset ($_GET['click'])) {
        $temp=$_GET['click'];
    } else {
        $temp='';
    }
    if ($temp=='sap_lich') {
        include "pages/sap_lich_lam.php";
    }
    elseif($temp=='dk_lich') {
        include "pages/dangkylich_ranh.php";
    }
    elseif($temp=='work') {
        include "pages/work.php";
    }
    else {
        include "pages/day.php";
    }
?>