<?
    class User
	{
		public $name;
		public $img_src;
		public $address;
        public $lat;
        public $lng;

        public static function getUsers()
		{
            include ("connection.php");
            $db = mysqli_connect($host, $user, $password, $database) or die("Error " . mysqli_error($db));
            $query = "SELECT * FROM users";
            $result = mysqli_query($db, $query);
            $users = [];
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($users, $row);
            }
            mysqli_close($db);
            return $users;
        }

        public function addUser(){

        }

        public function deleteUser($id){

        }

        public function getUser($id){

        }

        public function edituser(){
            require_once ("edit.php");
        }

        function get_latitude_longitude($address) {
            $address = trim($address);
            $address = str_replace(" ", "+", $address);
            $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$address."&sensor=false";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $details_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = json_decode(curl_exec($ch), true);
            curl_close($ch);
            if ($response['status'] != 'OK') {
                return null;
            }
            $latLng = $response['results'][0]['geometry']['location'];
            return $latLng;
        }


	}









?>