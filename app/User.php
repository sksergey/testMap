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
            include_once ("connection.php");
            $db = new mysqli($host, $user, $password, $database);
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            $sql = "SELECT * FROM users";
            $result = $db->query($sql);
            $users = [];
            while ($row = $result->fetch_assoc()) {
                array_push($users, $row);
            }
            $db->close();
            return $users;
        }

        public function addUser(){
            include_once ("connection.php");
            $db = new mysqli($host, $user, $password, $database);
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }
            $name = $_POST['name'];
            $address = $_POST['address'];
            $coord = $this->get_latitude_longitude($address);
            if(isset($_FILES) && ($_FILES['image']['size'] != 0)){
                $image = $this->saveImage();
            }
            else{
                $image = "/images/question.png";
            }
            $sql = "INSERT into users (name, address, image, lat, lng) VALUES ('$name', '$address', '$image', '$coord[lat]', '$coord[lng]')";
            $result = $db->query($sql);
            $db->close();
            if ($result === TRUE) {
                return "Record successfully";
            } else {
                return "Error record: " . $db->error;
            }
        }

        public function editUser($id){
            include_once ("connection.php");
                    $db = new mysqli($host, $user, $password, $database);
                    if($db->connect_error){
                        die("Connection failed: " . $db->connect_error);
                    }
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $coord = $this->get_latitude_longitude($address);
                    if(isset($_FILES) && ($_FILES['image']['size'] != 0)){
                        $image = $this->saveImage();
                    }
                    else{
                        $image = "/images/question.png";
                    }
                    $sql = "UPDATE users SET name = '$name' , address = '$address', image = '$image', lat = '$coord[lat]', lng = '$coord[lng]' WHERE id = $id";
                    //echo $sql;
                    $result = $db->query($sql);
                    $db->close();
                    if ($result) {
                        return "Record successfully";
                    } else {
                        return "Error record: " . $db->error;
                    }
                }

        public static function deleteUser($id){
            include ("connection.php");
            //unlink($user['image']);
            $db = new mysqli($host, $user, $password, $database);
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }
            $sql = "SELECT image FROM users WHERE id = $id";
            $result = $db->query($sql);
            $link = $result->fetch_assoc();
            //unlink('..'.$link['image']);
            $sql = "DELETE FROM users WHERE id = ".$id;
            $result = $db->query($sql);
            $db->close();
            if ($result === TRUE) {
                return "Record deleted successfully";
            } else {
                return "Error deleting record: " . $db->error;
            }
        }

        public static function getUser($id){
            include_once ("connection.php");
            $db = new mysqli($host, $user, $password, $database);
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }
            $sql = "SELECT * FROM users WHERE id = ".$id;
            $result = $db->query($sql);
            $db->close();
            return $result->fetch_assoc();
        }

        public function get_latitude_longitude($address) {
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

        public function saveImage(){
            $target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return "/images/".$_FILES["image"]["name"];
            } else {
                echo "Sorry, there was an error uploading your file.";
                die;
            }
        }


	}









?>