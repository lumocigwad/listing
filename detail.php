<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>



<body class="layout-top-nav">
    <!--============================= HEADER =============================-->
    <?php include 'includes/navbar.php'; ?>
    <!--//END HEADER -->
    <!--============================= BOOKING =============================-->
    <?php
    $conn = $pdo->open();

    $slug = $_GET['product'];

    try{
                
        $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
        $stmt->execute(['slug' => $slug]);
        $product = $stmt->fetch();
        
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

    //page view
    $now = date('Y-m-d');
    if($product['date_view'] == $now){
        $stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
        $stmt->execute(['id'=>$product['prodid']]);
    }
    else{
        $stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
        $stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
    }

?>

    <!-- Page -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 single-list-page">
                    <div class="single-list-slider owl-carousel" id="sl-slider">
                        <div class="sl-item set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="<?php echo (!empty($product['photo1'])) ? 'images/'.$product['photo1'] : 'images/noimage.jpg'; ?>">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="<?php echo (!empty($product['photo2'])) ? 'images/'.$product['photo2'] : 'images/noimage.jpg'; ?>">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                    </div>
                    <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                        <div class="sl-thumb set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>"></div>
                        <div class="sl-thumb set-bg" data-setbg="<?php echo (!empty($product['photo1'])) ? 'images/'.$product['photo1'] : 'images/noimage.jpg'; ?>"></div>
                        <div class="sl-thumb set-bg" data-setbg="<?php echo (!empty($product['photo2'])) ? 'images/'.$product['photo2'] : 'images/noimage.jpg'; ?>"></div>
                        <div class="sl-thumb set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>"></div>
                        <div class="sl-thumb set-bg" data-setbg="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>"></div>
                    </div>
                    
                </div>
                
                 </div>
                  </div>
                


    
        
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p><h5>T<?php echo $product['prodname']; ?></h5></p>
                    <span>• </span>
                    <div>
                    <p><span>KSH  <?php echo number_format($product['price'], 2); ?></span></p>
                    </div>
                    <p class="reserve-description">Innovative cooking, paired with fine wines in a modern setting.</p>
                     <hr>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                       
                             <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <?php echo '
                                <a href="product.php?product='.$slug.'" class="btn btn-danger">BOOK NOW!</a>

                                ';
                                
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        
                      <h4>Description</h4>
                        <hr>
                        
                       
               
                        <div class="booking-checkbox">
                            <p><?php echo $product['description']; ?></p>
                            
                            <hr>
                        </div>
                      
                    </div>
                   
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                       
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p><h4><b>Located in: </b>&nbsp;<?php echo $product['location']; ?></h4></p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p><h4><b>Contact:</b> &nbsp; <?php echo $product['contact']; ?></h4></p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p><h4><?php echo $product['units']; ?>: &nbsp;<span style='color:#006400;font-weight:bold;'>Units available<span></p></h4></p>
                             <hr>
                            <br>
                        </div>
                       
                    </div>
                    
            </div>
        </div>
    </section>

    <!--//END BOOKING DETAILS -->
    <!--============================= FOOTER =============================-->
    <?php include 'includes/footer.php'; ?>
    <!--//END FOOTER -->




    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Magnific popup JS -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="js/swiper.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
</body>

</html>
