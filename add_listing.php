<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container justify-content-center">
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
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>

                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>

                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
              </form>
    
</div>
</div>
            <?php include 'includes/scripts.php'; ?>