<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
  header('location: detail.php');
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
<div class="login-form"> 
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
          <div class='callout  text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>   
    <form action="register.php" method="POST">
		<div class="avatar"><i class="icon-user"></i></div>
    	<h4 class="modal-title">Register New Membership</h4>
        <div class="form-group">
             <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
             <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
        </div>
        
        
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Signup" name="signup">  <br>

        <div class="form-group small clearfix">
          <a href="login.php">I already have a membership</a><br>
           <a href="index.php" class="forgot-link"><i class="icon-home"></i> Home</a>
           
        </div>             
    </form>			
   
</div>
</body>
                              		                            