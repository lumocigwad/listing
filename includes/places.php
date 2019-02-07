
 <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Places</h3>
                    </div>
                </div>
            </div>
            
                            <?php

                            $conn=$pdo->open();

                            try{
                                $inc=3;
                                $stmt=$conn->prepare("SELECT * FROM products WHERE category_id ='1'");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                    $image=(!empty($row['photo']))? 'images/' .$row['photo'] : 'images/noimage.jpg';
                                    $inc= ($inc == 3) ? 1 : $inc + 1;
                                    if($inc==1) echo "<div class='row'>";

                echo"<div class='col-md-4 featured-responsive'>
                    <div class='featured-place-wrap'>
                   
                        
                          <img src='".$image."' class='img-fluid' alt='property image''>
                            
                            <div class='featured-title-box'>
                                <h6><a href='detail.php?product=".$row['slug']."'>".$row['name']."</h6>
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
                        }

                        $pdo->close();

                    ?> 
                                                           
               
                                
                       
                    </div>
                    <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div></div>
    </section>