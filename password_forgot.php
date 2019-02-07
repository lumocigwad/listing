<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body >
  <div class="container">
    <div class="row">
      <div class="col-md-12"></div>
<div class="login-form mail_form">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	

    	<form action="reset.php" method="POST">
    
      <h4 class="modal-title">Enter the Email associted with the Account</h4>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" required="required">
        </div>
        
        
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="SEND" name="reset">  <br>

        <div >
           <h6><a href="login.php" >I Remember My Password</a></h6><br>
           <h6><a href="index.php" ><i class="icon-home"></i> Home</a></h6>
           
        </div>             
    </form>     
      
</div>
	</div></div>

</body>
