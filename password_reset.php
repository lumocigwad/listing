<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['code']) OR !isset($_GET['user'])){
    header('location: index.php');
    exit(); 
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page layout-top-nav">
  <?php include 'includes/navbar.php'; ?> 
<div class="login-form mail_form " style="margin-top:60px;">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
  	<div class="login-box-body">
<h4 class="modal-title">Enter your new password</h4>

    	<form action="password_new.php?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="POST">
      		<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="password" placeholder="New password" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$"  title="Password must contain: Minimum 7 characters atleast 1 Alphabet and 1 Number">
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Re-type password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="reset"><i class="fa fa-check-square-o"></i> Reset</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
<?php include 'includes/footer.php' ?>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>