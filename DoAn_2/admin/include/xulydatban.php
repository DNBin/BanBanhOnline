<?php
    $mahd = $_GET['id'];
    $sql_check = "SELECT * FROM tbl_datban WHERE id_datban='$mahd'";
    $result_check = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_array($result_check);
    $hoten = $row['hoten'];
    if($row['trangthai'] == 0){
        $sql_update_tt = "UPDATE tbl_datban SET trangthai = 1 WHERE id_datban='$mahd'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="?quanly=datban"</script>';
    }else if($row['trangthai'] == 1){
        echo '<script>window.location="?quanly=datban"</script>';
    }else if($row['trangthai'] == 2){
        echo '<script>window.location="?quanly=datban"</script>';
    }
?>