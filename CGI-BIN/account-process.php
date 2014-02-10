<?php
	include('connect.php');
	
	$user = $_POST['username'];
	$user = ucfirst($user);
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if (isset($_POST['login'])) {
		/*$epass = sha1($password);
		
		try {
			$sql = "SELECT * FROM users WHERE username = '".$user."' AND password = '".$epass."' LIMIT 1";
			$result = $dbh->prepare($sql);
			$result->execute();
			$count = $result->rowCount();
		} catch (Exception $e) {
			echo $e;
		}*/
		try {
			$sql = "SELECT * FROM users WHERE username = '".$user."' LIMIT 1";
			$result = $dbh->prepare($sql);
			$result->execute();
			foreach ($result as $row) {
				$epass = $row['password'];
				$id = $row['id'];
				if (password_verify($password, $epass)) {
					$valid_user = true;
				} else {
					$valid_user = false;
				}
			}
		} catch (Exception $e) {
			echo $e;
			exit();
		}
		
		if ($valid_user == true) {
			session_start();
			$user = ucfirst($user);
			$_SESSION['user'] = $user;
			$_SESSION['id'] = $id;

			$timestamp = date('Y-m-d H:i:s');
			$sql = "UPDATE users SET last_active = '$timestamp' WHERE username = '$user'";
			$result = $dbh->prepare($sql);
			$result->execute();
			echo "Pw OK";
			header("Location: ../");
		} else {
			echo "Pw Not OK";
			header("Location: ../index.php?error=3");
			exit();
		}
	} else if (isset($_POST['register'])) {
		$head = $_POST['head'];
		if ($password == $cpassword) {
			$sql = "SELECT * FROM users WHERE username = '".$user."' LIMIT 1";
			$result = $dbh->prepare($sql);
			$result->execute();
			$count = $result->rowCount();
			echo "success\n";
			if ($count > 0)	{
				header("Location: ../index.php?error=2");
			} else {
				//$options = {'cost' => 12};
				//$epass = sha1($password);

				$options = [
					'cost' => 12 // the default cost is 10
				];
				$epass = password_hash($password, PASSWORD_DEFAULT, $options);
				echo "epass: $epass";
				try {
					$timestamp = date('Y-m-d H:i:s');
					
					$stmt = $dbh->prepare("INSERT INTO users (username, password, head, last_active) VALUES (:username, :password, :head, :last_active)");
					$stmt->execute(array(':username'=>$user, ':password'=>$epass, ':head'=>$head, ':last_active'=>$timestamp));

					$id = $dbh->lastInsertId();
					
					session_start();
					$user = ucfirst($user);
					$_SESSION['user'] = $user;
					$_SESSION['id'] = $id;
				} catch(PDOException $e) {
					echo $e->getMessage();
				}

				header("Location: ../");
			}
		} else {
			header("Location: ../index.php?error=1");
		}
	}

?>