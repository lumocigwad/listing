<div class="container">
    <div class="row center-block">
 <form method="POST" class="center-block" action="search.php">
             <div class=" btn-group" role="group" aria-label="Basic example">
            <input type="text" placeholder="What are your looking for?" class="btn-group1"  name="keyword" required="">
            <button type="submit" class="btn-form"><span class="fa fa-search"></span>SEARCH</i></button>
                                    </div></form> </div></div>
 <section class="main-block light-bg">

        <div class="container">
            <div class="row center-block ">

                <div class="center-block">
                    
                    <div class="styled-heading ">
                        <h3> Places</h3>
                    </div>
                </div>
            </div>
             <div class="row">
         <div class="col-md-12">
                            <?php

                            $conn=$pdo->open();

                            try{
                                $inc=3;
                                $stmt=$conn->prepare("SELECT * FROM products WHERE units>0 ");
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
                               
                                <p></p> <span> • </span>
                                <p><b><span>KSH  </span>".number_format($row['price'], 2)."</b></p>
                                <ul>
                                    <li><span class='icon-location-pin'></span>
                                        <p><b>Located at:  </b>".$row['location']."</p>
                                    </li>
                                    <li><span class='icon-screen-smartphone'></span>
                                        <p>".$row['contact']."</p>
                                    </li>
                                    <li><span class='icon-link'></span>
                                        <p>".$row['units']." <span style='color:#006400;font-weight:bold;'>Rooms available<span></p>
                                    </li>

                                </ul>
                               
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
                       
                           
                       </div> 

                       
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