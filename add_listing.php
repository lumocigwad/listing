<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_SESSION['land'])){
    header('location: login.php');
  }
 
?>

<?php include 'includes/header.php'; ?>


<?php include 'includes/navbar.php' ?>


?>

<html>

<body class="layout-top-nav">
<div class="container " style="margin-top: 60px;">
  <div class="col-md-2"></div>
<div class="col-sm-10 listing-form ">
<form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
  <h4 class="modal-title ">Add Your Listing</h4>
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category" required>
                      <option value="" selected>- Select -</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="location" class="col-sm-1 control-label">Location</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="location" name="location" required>
                  </div>

                  <label for="Contact" class="col-sm-1 control-label">Contact</label>

                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="contact" name="contact" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="price" name="price" required>
                  </div>

                  <label for="units" class="col-sm-1 control-label">No Of units</label>

                  <div class="col-sm-5">
                   <input type="number" class="form-control" id="units" name="units" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>

                  <label for="photo1" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo1" name="photo1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="photo2" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo2" name="photo2">
                  </div>

                  

                 
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                  </div>
                </div>
                 <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
              
    
</div>
</div>
<?php include 'includes/footer.php' ?>
            <?php include 'includes/scripts.php'; ?>
        
<script>
$(function(){


  $('#name').click(function(e){
    e.preventDefault();
    getCategory();
  });

});

function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>
