
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="layout-top-nav">
    <div class="wrapper">
    <!--============================= HEADER =============================-->
    
    <?php include 'includes/navbar.php'; ?>
    <!--//END header -->
    <!-- SLIDER -->
   <?php include 'land.php'; ?>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->
    
    <!--//END FIND PLACES -->
    <!--============================= FEATURED PLACES =============================-->
   
    <!--//END FEATURED PLACES -->
    <?php include 'includes/places.php'; ?>
    <!--============================= ADD LISTING =============================-->
    
  
    
    <!--//END ADD LISTING -->
    <!--============================= FOOTER =============================-->
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
    <!--//END FOOTER -->




    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
</div>
</body>

</html>
