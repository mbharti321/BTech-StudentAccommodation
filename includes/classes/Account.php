<?php
	class Account {

		private $con;
		private $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function loginUser($email, $pw) {
			$pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE email='$email' AND password='$pw'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginUserFailed);
				return false;
			}
		}
		public function loginAdmin($email, $pw) {
			$pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM admin WHERE email='$email' AND password='$pw'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginAdminFailed);
				return false;
			}
		}
		// $fullName, $email, $password, $password2
		public function registerUser($name, $em, $pw, $pw2) {
			$this->validateName($name);
			$this->validateEmail($em);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($name, $em, $pw);
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		public function getBulkError() {
			$errorStr = "";
			foreach ($this->errorArray as $error) {
				$errorStr .= "<span class='errorMessage'>$error</span>";
			}
			return $errorStr;
		}

		private function insertUserDetails($name, $em, $pw) {
			$encryptedPw = md5($pw);

			$insertQuery = "INSERT INTO users (fullName, email, password) VALUES ('$name', '$em', '$encryptedPw')";
			$result = mysqli_query($this->con, $insertQuery);

			return $result;
		}

		
		private function validateName($name) {
			if(strlen($name) > 25 || strlen($name) < 5) {
				array_push($this->errorArray, Constants::$NameCharacters);
				return;
			}
		}


		private function validateEmail($em) {
			
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}

		private function validatePasswords($pw, $pw2) {
			
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}

	}
?>