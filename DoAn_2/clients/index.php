<?php
	include_once('./connect.php');
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bin Cake - Cửa hàng bánh ngọt</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
       

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="./public/lib/animate/animate.css" rel="stylesheet">
        <link href="./public/lib/animate/animate.css" rel="stylesheet" >
        <link href="./public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="./public/lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="./public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="./public/css/style.css" rel="stylesheet">
    </head>
    <body>
        
    <?php
        include('./include/header.php');
        
        if(isset($_GET['quanly'])){
            $tam=$_GET['quanly'];
        }else{
            $tam='';
        }
        if($tam=='product'){
            include('./include/product.php');
            
        }elseif($tam=='cart'){
            include('include/cart.php');
        }
        elseif($tam=='about'){
            include('include/about.php');
        }
        elseif($tam=='search'){
            include('include/search.php');
        }
        elseif($tam=='contact'){
            include('include/contact.php');
        }
        elseif($tam == 'menu'){
            include('include/menu.php');
        }
        elseif($tam == 'pay'){
            include('include/pay.php');
        }
        elseif($tam=='booking'){
            include('include/booking.php');
        }
        elseif($tam=='cartme'){
            include('include/cart_me.php');
        }
        elseif($tam=='huy'){
            include('include/xulyhuy.php');
        }
        elseif($tam=='chitietdh'){
            include('include/info_dh.php');
        }
        elseif($tam=='bookme'){
            include('include/booking_me.php');
        }
        elseif($tam=='huydb'){
            include('include/xulyhuydatban.php');
        }
        else{  
            include('./include/home.php');
        }
        
        include('./include/footer.php');
        
    ?>	

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="./public/lib/easing/easing.min.js"></script>
        <script src="./public/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="./public/lib/tempusdominus/js/moment.min.js"></script>
        <script src="./public/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="./public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="./public/mail/jqBootstrapValidation.min.js"></script>
        <script src="./public/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="./public/js/main.js"></script>
    </body>
</html>