
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>
	<?php include 'includes/navbar.php'; ?>
	<section class="main-block light-bg">
        <div class="container">
            
	 <?php
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '
                        <div class="row justify-content-center">
                        <div class="col-md-5">
                        <div class="styled-heading">
                        <h3 class="page-header">No Search Results  For <b>'.$_POST['keyword'].'</b></h3>
                        </div>
                         </div>
                       </div>';
	       			}
	       			else{
	       				echo '
                        <div class="row justify-content-center">
                        <div class="col-md-5">
                        <div class="styled-heading">
                        <h3 class="page-header">Search results for <b>'.$_POST['keyword'].'</b></h3>
                         </div>
                         </div>
                       </div>';
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
						    	 if($inc==1) echo "<div class='row'>";

                echo"<div class='col-md-4 featured-responsive'>
                    <div class='featured-place-wrap'>
                       
                            <img src='".$image."' class='img-fluid'  width='100%' height='230px' alt='#''>
                            <span class='featured-rating-orange'>6.5</span>
                            <div class='featured-title-box'>
                                <h6><a href='detail.php?product=".$row['slug']."'>".$highlighted."</a></h6>
                                <p>Restaurant </p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><b>KSH".number_format($row['price'], 2)."</b></p>
                                <ul>
                                    <li><span class='icon-location-pin'></span>
                                        <p>1301 Avenue, Brooklyn, NY 11230</p>
                                    </li>
                                    <li><span class='icon-screen-smartphone'></span>
                                        <p>+44 20 7336 8898</p>
                                    </li>
                                    <li><span class='icon-link'></span>
                                        <p>https://burgerandlobster.com</p>
                                    </li>

                                </ul>
                                <div class='bottom-icons'>
                                    <div class='closed-now'>CLOSED NOW</div>
                                    <span class='ti-heart'></span>
                                    <span class='ti-bookmark'></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";
                        if($inc==3) echo "</div>";

                                    # code...
                                }
                                if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
                                if($inc == 2) echo "<div class='col-sm-4'></div></div>";
                            }
                           catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }}

                        $pdo->close();

                    ?> 
                                                           
               
                                
                    
                    </div>
                </div>
            </div>

</section>

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
