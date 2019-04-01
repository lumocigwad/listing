<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$type=$_POST['type'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['address'] = $address;
		$_SESSION['contact'] = $contact;

		

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = '<h2> The Email you entered already exists </h2>';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password,type, firstname, lastname, activate_code, created_on, contact_info, address) VALUES (:email, :password, :type, :firstname, :lastname, :code, :now, :contact, :address)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'type'=>$type, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now, 'contact'=>$contact,'address'=>$address]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$_POST['password']."</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/listing/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);
		    		                           
				    try {
				        //Server settings
				   /*     $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'dennis.lumosi@gmail.com';     
				        $mail->Password = 'Science6';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'tls';                           
				        $mail->Port = 587;                                   
*/
				       $mail->setFrom('lumocigwad@gmail.com', 'iHostel');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('testsourcecodester@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'iHoste Sign Up';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = '<h2> Account created. Check your email to activate. </h2>';
				        header('location: login.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = '<h2> Message could not be sent. Mailer Error: </h2>'.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>

