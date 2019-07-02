<?php 
	
session_start();


class nepska_election{
	var $conn;

	function __construct(){
		include('koneksi.php');
		$this->conn = $koneksi;
	}
	
	function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
	}

	function register($email, $user, $pass){
	 	$insert_query = "INSERT INTO `user` (`id`, `email`, `user`, `pass`, `status`) VALUES (NULL, ?, ?, ?, '1')";
			
	 	$pass = sha1(md5($pass));

		$check_user = "SELECT * FROM `user` where user = ?";
		$user_prepare = $this->conn->prepare($check_user);
		$user_prepare->bind_param("s", $user);
		$user_prepare->execute();
		$user_prepare->store_result();
		
		// die(var_dump($user_prepare->num_rows));

		if($user_prepare->num_rows != 0){
			return 'user_fail';
			exit;
		}

		$check_email = "SELECT * from `user` where email = ?";
		$email_prepare = $this->conn->prepare($check_email);
		$email_prepare->bind_param("s", $email);
		$email_prepare->execute();
		$email_prepare->store_result();

		if($email_prepare->num_rows != 0){
			return 'email_fail';
			exit;
		}

		$prepare = $this->conn->prepare($insert_query);
		$prepare->bind_param("sss", $email, $user, $pass);
		
		if($prepare->execute()){
			return True;
		}else{
			return $prepare->error;
		}

	}


	function login($user, $pass){
		$query = "";
		$pass  = sha1(md5($pass));
		
		if(filter_var($user, FILTER_VALIDATE_EMAIL)){
			$query = "SELECT * FROM `user` where `email` = ? and pass = ?";
		}else{
			$query = "SELECT * FROM `user` where `user` = ? and pass = ?";
		}

		$preapre = $this->conn->prepare($query);
		$preapre->bind_param("ss",$user,$pass);
		$preapre->execute();
		$get_result = $preapre->get_result();
		$result     = $get_result->fetch_assoc();

		if($get_result->num_rows == 1){
			$_SESSION['id'] = $result['id'];
			return True;
		}else{
			return False;
		}		
	}

	function admin_login($user,$pass){
		$pass = sha1(md5($pass));
		$query = "SELECT * FROM `admin` WHERE `username` = ? and `password` = ?";

		$prepare = $this->conn->prepare($query);
		$prepare->bind_param("ss", $user, $pass);
		$prepare->execute();
		$get_result = $prepare->get_result();
		$result     = $get_result->fetch_assoc();

		if($get_result->num_rows == 1){
			$_SESSION['admin'] = $result['id'];
			return True;
		}else{
			return False;
		}

	}


//end of class
}
//end of class
?>