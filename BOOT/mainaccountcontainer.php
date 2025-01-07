<?php
session_start();
?>

<?php include("database_connect_2.php");

class Container
{
	function shipping_enquiry_submitting($weight,$dateofd,$custname,$src,$dest,$type,$size,$p,$n,$conn)
	{
		$USER = $_SESSION["a"];
        $PASS = $_SESSION["b"];
        $sql2 = "SELECT * FROM customer where useremail='$USER' and password = '$PASS'";
        if ($res = mysqli_query($conn, $sql2)) {
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_array($res)){
                                $u = $row["userid"];

                }
            }
        }
		$sql = "insert into container_table (cargo_weight,DOD,customer_email,source,destination,type,size,phonenumber,Date_and_time,name,userid) values('$weight','$dateofd','$custname','$src','$dest','$type','$size','$p',NOW(),'$n',$u)";
		if(mysqli_query($conn,$sql))
		{
			echo "<script>alert('Your enquiry has Submited successfully');</script>";
			echo "<script>window.location = 'http://localhost/BOOT/mainaccount.php';</script>";
		}
		else
		{
			echo mysqli_error($conn);
		}
	}

	public $containersource;
	public $containerdestination;
	public $containerweight;
	public $dateofdeparcture;
	public $containertype;
	public $containersize;
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
}

$user = new Container();

$user->set_container_source($_POST["sourceofcontainer"]);
$user->set_container_destination($_POST["destinationofcontainer"]);
$user->set_container_type($_POST["typeofcontainer"]);
$user->set_container_size($_POST["sizeofcontainer"]);
$user->set_container_weight($_POST["cweight"]);
$user->set_date_of_deparcture($_POST["userdate"]);

$src = $user->get_container_source();
$dest = $user->get_container_destination();
$type = $user->get_container_type();
$size = $user->get_container_size();
$weight = $user->get_container_weight();
$dateofd = $user->get_date_of_deparcture();


	$USER = $_SESSION["a"];
	$PASS = $_SESSION["b"];
	$custname = $USER;
	$sql2 = "SELECT * FROM customer where useremail='$USER' and password='$PASS'";
	if($res = mysqli_query($conn,$sql2))
	{
		if(mysqli_num_rows($res) > 0){
			while ($row = mysqli_fetch_array($res))
			{
				$p = $row["userphone"];
				$n = $row["username"];
			}
		}
	}
	if(isset($USER))
	{

	}

	$user->shipping_enquiry_submitting($weight,$dateofd,$custname,$src,$dest,$type,$size,$p,$n,$conn);
?>