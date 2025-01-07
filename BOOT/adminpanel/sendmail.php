<?php include("database_connect_2.php");

class Email
{
	public $emailreceiver;
	public $emailsubject;
	public $emailbody;
	function set_email_reveiver($emailreceiver)
	{
		$this->emailreceiver = $emailreceiver;
	}
	function set_email_subject($emailsubject)
	{
		$this->emailsubject = $emailsubject;
	}
	function set_email_body($emailbody)
	{
		$this->emailbody = $emailbody;
	}

	function get_email_reveiver()
	{
		return $this->emailreceiver;
	}
	function get_email_subject()
	{
		return $this->emailsubject;
	}
	function get_email_body()
	{
		return $this->emailbody;
	}

	function sendemail($x, $y, $z, $conn)
	{
		$to_email = $x;
		$subject = $y;
		$body = $z;

		$sql = "insert into email(receiver,subject,body,date) values ('$to_email','$subject','$body',NOW())";
		if (mysqli_query($conn, $sql)) {
		} else {
			
		}
		$headers = "From: jigeshjethava89@gmail.com";
		if (mail($to_email, $subject, $body, $headers)) {
			echo "<script>alert('Email Send successfully')</script>";
			echo "<script>window.location = './adminpanelemail.php';</script>";
		} else {
			echo "Email sending failed...";
		}
	}
}
$email = new Email();
$email->set_email_reveiver($_POST["remail"]);
$email->set_email_subject($_POST["rsubject"]);
$email->set_email_body($_POST["temail"]);

$a = $email->get_email_reveiver();
$b = $email->get_email_subject();
$c = $email->get_email_body();

$email->sendemail($a, $b, $c, $conn);
