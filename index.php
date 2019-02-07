
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body>
    <!--============================= HEADER =============================-->
    </body>
    <?php include 'includes/navbar.php'; ?>
    <!--//END header -->
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">
               <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Discover Hostels in Chuka</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4" method="POST" action="search.php">
                                    <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
                                        <input type="text" placeholder="What are your looking for?" class="btn-group1" name="keyword" required="">
                                       
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                               
                                <div class="slider-link">
                                    <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Addred</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->
    <?php include 'includes/category.php'; ?>
    <!--//END FIND PLACES -->
    <!--============================= FEATURED PLACES =============================-->
   
    <!--//END FEATURED PLACES -->
    <?php include 'includes/places.php'; ?>
    <!--============================= ADD LISTING =============================-->
    
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach hundreds of Students</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--//END ADD LISTING -->
    <!--============================= FOOTER =============================-->
    <?php include 'includes/footer.php'; ?>
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
</body>

</html>
