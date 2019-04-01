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
						if($row['type']==1){
							$_SESSION['admin'] = $row['id'];
						}
						if($row['type']==0){
							$_SESSION['user'] = $row['id'];
						}
						if($row['type']==2){
							$_SESSION['land'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = '<h2> You have typed an incorrect password please try again! </h2>';
					}
				}
				else{
					$_SESSION['error'] = '<h2> Account not activated! plese check your Email to activate </h2>';
				}
			}
			else{
				$_SESSION['error'] = '<h2>The Email you entered does not exist in the system ! please signup to create an account </h2>';
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