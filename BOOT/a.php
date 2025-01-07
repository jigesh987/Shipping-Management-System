<?php
session_start();
?>
<?php include("database_connect_2.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	class Person
	{
		public $username;
		public $userage;
		public $useremail;
		public $userdate;
		public $usergender;
		public $userphone;
	}
	class Customer extends Person
	{
		public $userpassword2;
		function set_name($username)
		{
			$this->username = $username;
		}
		function set_age($userage)
		{
			$this->userage = $userage;
		}
		function set_email($useremail)
		{
			$this->useremail = $useremail;
		}
		function set_date($userdate)
		{
			$this->userdate = $userdate;
		}
		function set_phone($userphone)
		{
			$this->userphone = $userphone;
		}

		function set_gender($usergender)
		{
			$this->usergender = $usergender;
		}
		function set_password($userpassword2)
		{
			$this->userpassword2 = $userpassword2;
		}
		function get_name()
		{
			return $this->username;
		}

		function get_age()
		{
			return $this->userage;
		}
		function get_email()
		{
			return $this->useremail;
		}
		function get_date()
		{
			return $this->userdate;
		}
		function get_phone()
		{
			return $this->userphone;
		}

		function get_gender()
		{
			return $this->usergender;
		}

		function get_password()
		{
			return $this->userpassword2;
		}


		function registeraccount($name, $age, $email, $date, $gender, $phone, $pass, $conn)
		{
			$sql = "insert into customer(username,userage,useremail,date_of_birth,usergender,userphone,password,date) values ('$name','$age','$email','$date','$gender','$phone','$pass',NOW())";
			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Your account has created successfully')</script>";
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/login.php';</script>";
			} else {
				echo "<script>alert('E-mail address or Phone number is already in used . Please select different E-mail Address or Phone Number')</script>";
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/signup.php';</script>";
			}
		}
	}

	class Container extends Person
	{
		public $containersource;
		public $containerdestination;
		public $containerweight;
		public $dateofdeparcture;
		public $containertype;
		public $containersize;

		function set_name_for_container($username)
		{
			$this->username = $username;
		}
		function set_phone_for_container($userphone)
		{
			$this->userphone = $userphone;
		}
		function set_container_source($containersource)
		{
			$this->containersource = $containersource;
		}
		function set_container_destination($containerdestination)
		{
			$this->containerdestination = $containerdestination;
		}
		function set_container_weight($containerweight)
		{
			$this->containerweight = $containerweight;
		}
		function set_container_size($containersize)
		{
			$this->containersize = $containersize;
		}
		function set_container_type($containertype)
		{
			$this->containertype = $containertype;
		}

		function set_date_of_deparcture($dateofdeparcture)
		{
			$this->dateofdeparcture = $dateofdeparcture;
		}

		function get_name_for_container()
		{
			return $this->username;
		}
		function get_phone_for_container()
		{
			return $this->userphone;
		}

		function get_container_source()
		{
			return $this->containersource;
		}

		function get_container_destination()
		{
			return $this->containerdestination;
		}
		function get_container_size()
		{
			return $this->containersize;
		}
		function get_container_weight()
		{
			return $this->containerweight;
		}
		function get_container_type()
		{
			return $this->containertype;
		}
		function get_date_of_deparcture()
		{
			return $this->dateofdeparcture;
		}


		function container_enquiry_submitting($weight, $dateofd, $custname, $src, $dest, $type, $size, $p, $n, $conn)
		{
			if (isset($_SESSION["a"])) {
				$USER = $_SESSION["a"];
				$PASS = $_SESSION["b"];
			}
			$sql2 = "SELECT * FROM customer where useremail='$USER' and password = '$PASS'";
			if ($res = mysqli_query($conn, $sql2)) {
				if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_array($res)) {
						$u = $row["userid"];
					}
				}
			}
			$sql = "insert into container_table (cargo_weight,DOD,customer_email,source,destination,type,size,phonenumber,Date_and_time,name,userid) values('$weight','$dateofd','$custname','$src','$dest','$type','$size','$p',NOW(),'$n',$u)";
			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Your enquiry has Submited successfully.We will send you mail for Booking confirmation');</script>";
				echo "<script>window.location = 'http://localhost/mscit_project/BOOT/mainaccount.php';</script>";
			} else {
				echo mysqli_error($conn);
			}
		}
	}


	$user = new Customer();
	if (isset($_POST["username"])) {
		$user->set_name($_POST["username"]);
		$user->set_age($_POST["userage"]);
		$user->set_email($_POST["useremail"]);
		$user->set_date($_POST["userdate"]);
		$user->set_phone($_POST["userphone"]);
		$user->set_password($_POST["userpassword2"]);
	}
	if (isset($_POST["submit"])) {
		$usergender = $_POST["gen"];
		$user->set_gender($usergender);
	}

	$name = $user->get_name();
	$age = $user->get_age();
	$email = $user->get_email();
	$date = $user->get_date();
	$phone = $user->get_phone();
	$gender = $user->get_gender();
	$pass = $user->get_password();


	if (isset($_POST["username"])) {
		$user->registeraccount($name, $age, $email, $date, $gender, $phone, $pass, $conn);
	}



	$shippment = new Container();

	if (isset($_POST["sourceofcontainer"])) {
		$shippment->set_container_source($_POST["sourceofcontainer"]);
		$shippment->set_container_destination($_POST["destinationofcontainer"]);
		$shippment->set_container_type($_POST["typeofcontainer"]);
		$shippment->set_container_size($_POST["sizeofcontainer"]);
		$shippment->set_container_weight($_POST["cweight"]);
		$shippment->set_date_of_deparcture($_POST["userdate"]);
	}

	$src = $shippment->get_container_source();
	$dest = $shippment->get_container_destination();
	$type = $shippment->get_container_type();
	$size = $shippment->get_container_size();
	$weight = $shippment->get_container_weight();
	$dateofd = $shippment->get_date_of_deparcture();

	if (isset($_SESSION["a"]) && isset($_SESSION["b"])) {
		$USER = $_SESSION["a"];
		$PASS = $_SESSION["b"];
		$custname = $USER;
		$sql2 = "SELECT * FROM customer where useremail='$USER' and password='$PASS'";
		if ($res = mysqli_query($conn, $sql2)) {
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_array($res)) {
					$p = $row["userphone"];
					$n = $row["username"];
					$shippment->set_phone_for_container($p);
					$shippment->set_name_for_container($n);
				}
			}
		}
	}

	$x = $shippment->get_phone_for_container();
	$y = $shippment->get_name_for_container();

	if (isset($_POST["sourceofcontainer"])) {
		$shippment->container_enquiry_submitting($weight, $dateofd, $custname, $src, $dest, $type, $size, $x, $y, $conn);
	}
} else {
}
?>