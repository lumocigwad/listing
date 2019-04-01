<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['land'])){
		header('location: index.php');
	}

	 $lid=$land['id'];

?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition  layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper" style="margin-top:60px; ">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>

	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?php echo (!empty($land['photo'])) ? 'images/'.$land['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-12">
                    <h4><b>Name: </b>&nbsp;<?php echo $land['firstname'].' '.$land['lastname']; ?>
                          <span class="pull-right">
                            <a href="#edit1" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                          </span>
                        </h4>
                      <h4><b>Email: </b>&nbsp;<?php echo $land['email']; ?></h4>
                      <h4><b>Contact Info:</b> &nbsp;<?php echo (!empty($land['contact_info'])) ? $land['contact_info'] : 'N/a'; ?></h4>
                       <h4><b>Address:</b> &nbsp;<?php echo (!empty($land['address'])) ? $land['address'] : 'N/a'; ?></h4>
                          <h4><b>Member Since:</b> &nbsp;<?php echo date('M d, Y', strtotime($land['created_on'])); ?></h4>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a>
            
            </div>
           <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Views Today</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                       try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products WHERE userid=$lid");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                        $image1 = (!empty($row['photo1'])) ? 'images/'.$row['photo1'] : 'images/noimage.jpg';
                        $image2 = (!empty($row['photo2'])) ? 'images/'.$row['photo2'] : 'images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <img src='".$image1."' height='30px' width='30px'>
                              <img src='".$image2."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                            <td>&#36; ".number_format($row['price'], 2)."</td>
                            <td>".$counter."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>            
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
                </div>
                <div class="box-body">
                  <table class="table table-bordered" id="example1">
                    <thead>
                      <th class="hidden"></th>
                      <th>Date</th>
                      <th>Transaction#</th>
                      <th>Amount</th>
                      <th>Full Details</th>
                      
                    </thead>
                    <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM sales WHERE land_id=:user_id ORDER BY sales_date DESC");
                        $stmt->execute(['user_id'=>$land['id']]);
                        foreach($stmt as $row){
                          $stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
                          $stmt2->execute(['id'=>$row['id']]);
                          $total = 0;
                          foreach($stmt2 as $row2){
                            $subtotal = $row2['price']*$row2['quantity'];
                            $total += $subtotal;
                          }
                          echo "
                            <tr>
                              <td class='hidden'></td>
                              <td>".date('M d, Y', strtotime($row['sales_date']))."</td>
                              <td>".$row['pay_id']."</td>
                              <td>&#36; ".number_format($total, 2)."</td>
                              <td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
                            </tr>

                          ";
                        }

                      }
                      catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                  }

                      $pdo->close();
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
     
  </div>
  
	        	</div>



	        	<!-- <div class="col-sm-3">
	        		<?php // include 'includes/sidebar.php'; ?>
	        	</div> -->
	        </div>
	      </section>
	     
	    </div>
	  </div>

  
  
</div>
  <?php include 'includes/footer.php'; ?>
    <?php include 'includes/profile_modal.php'; ?>
    <?php include 'admin/includes/products_modal.php'; ?>
    <?php include 'admin/includes/products_modal2.php'; ?>
<?php include 'includes/scripts2.php'; ?>



<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_location').val(response.location);
       $('#edit_contact').val(response.contact);
       $('#edit_units').val(response.units);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}
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
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transaction.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>