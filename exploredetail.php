<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor Details</title>
	 <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Lemonada">
	<style type="text/css" media="screen">
	.doctor-holder
	{
		font-family: Lemonada,georia;
	}

	</style>
</head>
<body >
	<div class=cat>
	<?php
	$city=$_POST["area"];
	$type=$_POST["specilality"];

	include("connection.php");
	$result=mysqli_query($con,"SELECT * from doctor WHERE specializaton='$type' and city='$city'");
	if (mysqli_num_rows($result) > 0) {

		echo"<h1 align=center style=' font-family: Lemonada'>View Searched Doctors</h1>";	
	  while($row = mysqli_fetch_assoc($result)) {
	  	echo "<div class='doctor-holder'>
	  			<div class='row'>
	  				<div class='my-col-3 '>"."<img src='".$row["img"]."'"."width='100%' height='100%''></div>".
	  				"<div class='my-col-9 '><p>Name: ".$row["Name"]."</p><p class='info_holder'>Email: ".$row["Email"]."</p><p>Education: ".$row["Education"]."</p><p>Contact: ".$row["Contact"]."</p><p>City: ".$row["city"]."</p></div>
	  				<div class='my-col-12 '><a href='doctordetail.php?Id=".$row["Id"]."'><button>Check Details</button></a></div>
	  				</div>
	  		</div>";
	  }
	}

	?>
<?php
include('footer.php');
?>
</div>
</body>
</html>
