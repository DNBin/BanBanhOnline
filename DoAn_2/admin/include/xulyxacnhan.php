<?php
    $mahd = $_GET['mahd'];
    $sql_check = "SELECT * FROM tbl_donhang WHERE mahang='$mahd'";
    $result_check = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_array($result_check);
    $hoten = $row['hoten'];
    if($row['tinhtrang'] == 0){
        $to_email = $row['email'];
        $subject = 'ORDER CONFIRMATION';
        echo $message = 'Đơn hàng gồm : ahihi';
        $headers = 'From:nguyenvanba123@gmail.com';
        @mail($to_email,$subject,$message,$headers);

        $sql_update_tt = "UPDATE tbl_donhang SET tinhtrang = 1 WHERE mahang='$mahd'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="?quanly=thongke"</script>';

    }else if($row['tinhtrang'] == 1){
        $sql_update_tt2 = "UPDATE tbl_donhang SET tinhtrang = 2 WHERE mahang='$mahd'";
        mysqli_query($con, $sql_update_tt2);
        echo '<script>window.location="?quanly=thongke"</script>';
    }else if($row['tinhtrang'] == 2){
        $sql_update_tt3 = "UPDATE tbl_donhang SET tinhtrang = 3 WHERE mahang='$mahd'";
        mysqli_query($con, $sql_update_tt3);
        echo '<script>window.location="?quanly=thongke"</script>';
    }else if($row['tinhtrang'] == 3){
        $sql_update_tt4 = "UPDATE tbl_donhang SET tinhtrang = 4 WHERE mahang='$mahd'";
        mysqli_query($con, $sql_update_tt4);
        echo '<script>window.location="?quanly=thongke"</script>';
    }else if($row['tinhtrang'] == 4){
        echo '<script>window.location="?quanly=thongke"</script>';
    }
    else if($row['tinhtrang'] == 5){
        echo '<script>window.location="?quanly=thongke"</script>';
    }
?>