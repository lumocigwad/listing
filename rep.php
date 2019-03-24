<?php
include 'includes/slugify.php';
if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];


		if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				//move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}


		echo "name:".$name ;
		echo "<br>";
		echo "category:".$category;
		echo "<br>";
		echo "slug:".$slug;
		echo "<br>";
		echo "contact:".$contact;
		echo "<br>";
		echo "units:".$units;
		echo "<br>";
		echo "description:".$description;
		echo "<br>";
		echo "photo:".$new_filename;
		}
		else{
			echo "wewe";
		}




		?>