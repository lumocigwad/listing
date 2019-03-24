<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$location = $_POST['location'];
		$contact = $_POST['contact'];
		$units = $_POST['units'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET name=:name, slug=:slug, category_id=:category, location=:location, contact=:contact, price=:price, description=:description, units=:units WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'category'=>$category, 'location'=>$location, 'contact'=>$contact, 'price'=>$price, 'description'=>$description, 'units'=>$units,'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: landprofile.php');

?>