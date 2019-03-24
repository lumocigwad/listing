<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		$filename1 = $_FILES['photo1']['name'];
		$filename2 = $_FILES['photo2']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$new_filename);
			$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
				$new_filename1 = $row['slug'].'_'.time().'_'.'1'.'.'.$ext1;
				move_uploaded_file($_FILES['photo1']['tmp_name'], 'images/'.$new_filename1);
				$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
				$new_filename2 = $row['slug'].'_'.time().'_'.'2'.'.'.$ext2;
				move_uploaded_file($_FILES['photo2']['tmp_name'], 'images/'.$new_filename2);		
		}
		
		try{
			$stmt = $conn->prepare("UPDATE products SET photo=:photo,photo1=:photo1,photo2=:photo2 WHERE id=:id");
			$stmt->execute(['photo'=>$new_filename,'photo1'=>$new_filename1,'photo2'=>$new_filename2, 'id'=>$id]);
			$_SESSION['success'] = 'Product photo updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select product to update photo first';
	}

	header('location: landprofile.php');
?>