<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = '<h2> Incorrect Password! </h2>';
					}
				}
				else{
					$_SESSION['error'] = '<h2> Account not activated! </h2>';
				}
			}
			else{
				$_SESSION['error'] = '<h2> Email not found! </h2>';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = ' <h2> Input login credentails first </h2>';
	}

	$pdo->close();

	header('location: login.php');

?>