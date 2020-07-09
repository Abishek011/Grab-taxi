<?php

$con=mysqli_connect('localhost','root','','');


if(mysqli_connect_error())
	die("connection failed: ".mysqli_connect_error());
else
{
	if($stmt=$con->prepare('select userid,password from employee where userid=?'))
	{
		
		$stmt->bind_param('s',$_POST['userid']);
		$stmt->execute();

		$stmt->store_result();

		

		if($stmt->num_rows>0)
		{
			$stmt->bind_result($userid,$password);
			$stmt->fetch();

			if($_POST['password']==$password)
			{
				echo "welcome";
			}
			else
				die("incorrect password");
		}
		else
			die("incorrect username");
	}
	
}
	
	$con->close();
?>