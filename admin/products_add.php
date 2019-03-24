<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$location = $_POST['location'];
		$contact = $_POST['contact'];
		$price = $_POST['price'];
		$units = $_POST['units'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];
		$filename1 = $_FILES['photo1']['name'];
		$filename2 = $_FILES['photo2']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$new_filename);	
				$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
				$new_filename1 = $slug.'1'.'.'.$ext1;
				move_uploaded_file($_FILES['photo1']['tmp_name'], 'images/'.$new_filename1);
				$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
				$new_filename2 = $slug.'2'.'.'.$ext2;
				move_uploaded_file($_FILES['photo2']['tmp_name'], 'images/'.$new_filename2);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, photo, photo1,photo2, contact, location, units) VALUES (:category, :name, :description, :slug, :price, :photo, :photo1, :photo2, :contact, :location, :units)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'photo'=>$new_filename, 'photo1'=>$new_filename1, 'photo2'=>$new_filename2,'contact'=>$contact, 'location'=>$location, 'units'=>$units]);
				$_SESSION['success'] = 'Hostel added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>