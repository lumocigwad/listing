<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
  header('location: index.php');
  }
   if(isset($_SESSION['land'])){
  header('location: index.php');
  }
  ?>
<?php include 'includes/header.php';?>
<style type="text/css">
    body {
        color: #999;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
	
</style>
</head>
<body>
  <div class="container">
    <div class="erd">
     <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout  text-center'>
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
    ?>   </div>
  </div>
<div class="login-form"> 
   
    <form action="verify.php" method="POST">
		<div class="avatar"><i class="fa fa-user"></i></div>
    	<h4 class="modal-title">Login to Your Account</h4>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$"  title="Password must contain: Minimum 7 characters atleast 1 Alphabet and 1 Number">
        </div>
        <div class="form-group small clearfix">
       
            <a href="password_forgot.php" class="forgot-link" >Forgot Password?</a>
        </div> 
        
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="login">  <br>

        <div class="form-group small clearfix">
           <a href="index.php" class="forgot-link"><i class="icon-home"></i> Home</a>
           
        </div>             
    </form>			
    <div class="text-center small">Don't have an account? <a href="signup.php">Sign up</a></div>
</div>
</body>
                              		                            