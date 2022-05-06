<?php
         $id = $_GET["id"];
        $sql_update_tt = "UPDATE tbl_datban SET trangthai = 2 WHERE id_datban='$id'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="?quanly=bookme"</script>';
?>