<?php
	date_default_timezone_set('Asia/Manila');

	include 'dbconnect.php';
	session_start();
	
	// Insert note into the database 
	if($_POST['action'] == 'add_note'){
		$user_id =$_SESSION['user_id'];
		try {
			$name = $_POST['data']["name"];
			$description = $_POST['data']["description"];
			
			///pdo
			$pdo->beginTransaction();
			$prepared_statement = $pdo->prepare("INSERT INTO tbl_notes (title, description, user_id, status) VALUES (?,?,?,?)");
			echo json_encode($name);
			echo json_encode($description);

			$prepared_statement->execute(array($name, $description, $user_id, true));

			echo $pdo->lastInsertId();

			$pdo->commit();
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}
	}

	// Get notes from the database and return it to javascipt and return notes to javascript
	else if($_POST['action'] == 'get_notes'){
		$user_id =$_SESSION['user_id'];
		try {
			$sql = "SELECT * FROM  tbl_notes WHERE user_id = $user_id AND status = 1";
			$stm = $pdo->query($sql);
			$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($rows);
			
		} catch (Exception $e) {

			throw $e;
		}

	}

	//Delete note from the database using note id
	else if($_POST['action'] == 'delete_note'){

		$note_id =  intval($_POST['id']);
		try {

			$pdo->beginTransaction();
			$prepared_statement = $pdo->prepare("DELETE FROM tbl_notes WHERE id=?");

			$prepared_statement->execute(array($note_id));

			$pdo->commit();

			echo "deleted";
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}

	}

	//Update or edit note from the database using note id
	else if($_POST['action'] == 'edit_note'){
		
		try {
			
			$pdo->beginTransaction();
			$prepared_statement = $pdo->prepare("UPDATE tbl_notes SET title = ? , description = ? , updated_at = ? WHERE id = ?");

			$prepared_statement->execute(array($_POST['data']["title"],$_POST['data']["description"],date("Y-m-d 
				H:i:s"),$_POST['data']["id"]));

			$pdo->commit();

			echo "edited!";
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}

	}

	//function to check a username exist from the database and return it to javascript
	else if($_POST['action'] == 'ifUserExist'){
		$username = $_POST['data']["username"];

		try {
			$sql = "SELECT username FROM  tbl_users WHERE username = '$username'";
			$stm = $pdo->query($sql);
			if ($stm) {
				$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($rows);
			}else {
				echo json_encode('ERROR');
			}
			
			
		} catch (Exception $e) {

			throw $e;
		}

	}


	//Register new user and save it into the database
	else if($_POST['action'] == 'register'){
		$username = $_POST['data']["username"];
		$firstname = $_POST['data']["firstname"];
		$lastname = $_POST['data']["lastname"];
		$password = $_POST['data']["password"];
		$password = password_hash($password, PASSWORD_BCRYPT);
		try{
		$pdo->beginTransaction();
			$prepared_statement = $pdo->prepare("INSERT INTO tbl_users (username, firstname, lastname, password) VALUES (?,?,?,?)");
			echo json_encode($username);
			echo json_encode($firstname);
			echo json_encode($lastname);
			echo json_encode($password);

			$prepared_statement->execute(array($username, $firstname, $lastname, $password));

			echo $pdo->lastInsertId();

			$pdo->commit();
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}

	}


	//Decypting password and checking if it match to input password return it to javascript
	else if($_POST['action'] == 'login'){
		$username = $_POST['data']["username"];
		$password = $_POST['data']["password"];

		try {
			$stmt = $con->prepare("SELECT user_id, firstname, lastname, username, password FROM tbl_users WHERE username=? LIMIT 1");
			$stmt->bind_param('s', $username);
			$stmt->execute();
            $stmt->bind_result($user_ID, $firstname, $lastname, $username, $hash);
            $stmt->store_result();

            if($stmt->num_rows == 1){
                while($stmt->fetch()){
                    if(password_verify($password, $hash)){
                        $_SESSION['user_id']=$user_ID;
                        $_SESSION['firstname']=$firstname;
                        $_SESSION['lastname']=$lastname;

                        echo json_encode('verified');
                    }else{
                    	echo json_encode('failed');
                    }
                    
            	}
            }
			
			
		} catch (Exception $e) {

			throw $e;
		}

	}

	//Destroy session or LOGOUT
	else if($_GET['action'] == 'logout'){
		session_destroy();
		echo json_encode( $_SESSION['user_id']);
	}
?>	