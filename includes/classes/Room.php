<?php
	class Room {

		private $con;
		private $errorArray;

		private $roomId;
        private $roomType;
        private $monthlyCharge;
        private $roomAllocated;
        private $paymentStatus;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public static function withID( $con, $roomId ) {
			$instance = new self($con);
			$instance->loadByID( $roomId );
			return $instance;
		}
		
		protected function loadByID( $roomId ) {
			// do query
			// `roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        	// `roomAllocated`, `paymentStatus`, `roomAdditionTime`
			$this->roomId = $roomId;			
            $query = mysqli_query($this->con, "SELECT * FROM rooms WHERE roomId='$this->roomId'");
            $rooms = mysqli_fetch_array($query);

            $this->roomType = $rooms['roomType'];
            $this->roomLocation = $rooms['roomLocation'];
            $this->monthlyCharge = $rooms['monthlyCharge'];
            $this->roomAllocated = $rooms['roomAllocated'];
            $this->paymentStatus = $rooms['paymentStatus'];

		}
		
		// public function __construct($con, $roomId) {
		// 	$this->con = $con;
		// 	$this->errorArray = array();		
		// }

		public function getRoomId() {
            return $this->roomId;
        }

        public function getRoomType() {
            return $this->roomType;
        }

        public function getRoomLocation() {
            return $this->roomLocation;
        }

         public function getMonthlyCharge() {
            return $this->monthlyCharge;
        }

        public function getRoomAllocated() {
            return $this->roomAllocated;
        }

        public function getPaymentStatus() {
            return $this->paymentStatus;
        }


		// $roomType, $roomLocation, $monthlyCharge
		public function addRoom($rType, $rLoc, $monCharge) {
			$this->validateCharge($monCharge);
			
			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertRoomDetails($rType, $rLoc, $monCharge);
			}
			else {
				return false;
			}
		}


		//$roomId, $roomType, $roomLocation, $monthlyCharge, $roomAllocated, $paymentStatus

        public function updateRoom($roomId, $rType, $rLoc, $monCharge, $rAllocated, $payStatus) {
            $this->validateCharge($monCharge);

            if(empty($this->errorArray) == true) {
                //Insert into db
               return $this->updateRoomDetails($roomId, $rType, $rLoc, $monCharge, $rAllocated, $payStatus);
            }
            else {
                return false;
            }

        }

        private function updateRoomDetails($roomId, $rType, $rLoc, $monCharge, $rAllocated, $payStatus){
        // `roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        // `roomAllocated`, `paymentStatus`, `roomAdditionTime`

            $updateQuery = "UPDATE  rooms set  roomType = '$rType', roomLocation = '$rLoc',
                                monthlyCharge = '$monCharge', roomAllocated = '$rAllocated', paymentStatus = '$payStatus' 
                                where roomId = '$roomId'";
            $result = mysqli_query($this->con, $updateQuery);

            return $result;
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

		// `roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        // `roomAllocated`, `paymentStatus`, `roomAdditionTime`
		private function insertRoomDetails($rType, $rLoc, $monCharge) {
			$insertQuery = "INSERT INTO rooms (roomType, roomLocation, monthlyCharge) VALUES ('$rType', '$rLoc', '$monCharge')";
			$result = mysqli_query($this->con, $insertQuery);

			return $result;
		}

		
		

		private function validateCharge($monCharge) {
						
			if(preg_match('/[^-+.0-9]/', $monCharge)) {
				array_push($this->errorArray, Constants::$rentNotAlphanumeric);
				return;
			}

			if($monCharge < 0) {
				array_push($this->errorArray, Constants::$rentNegative);
				return;
			}

		}

	}
?>