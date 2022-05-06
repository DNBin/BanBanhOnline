<?php
	require('connect.php');
         $mahd = $_GET["mahd"];
        $sql_update_tt = "UPDATE tbl_donhang SET tinhtrang = 5 WHERE mahang='$mahd'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="?quanly=cartme"</script>';
?>