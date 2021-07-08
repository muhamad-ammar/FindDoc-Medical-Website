<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Lemonada">

   <style type="text/css" media="screen">
   *{
      font-family: Lemonada,georia;
   }
	</style>
</head>
<body >
	<div  class=contact>
	<diV>
	<h1 style="text-align: center;color:white;margin-top: 10px;width: 100%;height: 100%"><em><b>Your Appointments</b></em></h1>
	<div class="my-col-12 my-col-mobile-4">
		<?php
		echo "<table class='pro' align='center'>
		<tr id='pro'>
		<th id='thea'>Patient Name</th>
		<th id='thead'>Contact</th>
		<th id='thead'>Time</th>
		<th id='thead' style='padding:0px 10px'>Date</th>
		<th id='thead'>Online</th>
		</tr>";
		$sql = "select u.Full_Name,d.Email,d.Contact,a.time,a.date,a.status,d.Id  from doctor d JOIN appointment a on a.Id=d.Id join user u on a.userid=u.Userid WHERE a.Id='$id'";
		$result = mysqli_query($con, $sql);
		$curr_date=date("Y-m-d");

		if (mysqli_num_rows($result) > 0){

			// doctor query here
			while ($row=$result-> fetch_assoc()){
				$tt=array($row['date']."&nbsp;".$row['time'],$row['Id']);	
				echo "<tr id='pro'><td style='padding;0px; width:5%'>".$row['Full_Name']."</td><td style='padding;0px; width:5%; text-align:center'>".$row['Contact']."</td><td>".$row['time']."</td><td>".$row['date']."</td><td><button onclick=hello('".json_encode($tt)."')>Call now</button></a></td></tr>";
			}
		}
		else
			echo "doctor query not working";
		
		echo "</table>";
		?>
</div>
	</div>
	<?php
	include('footer.php');
	?>
</div>

</body>
<script type="text/javascript">
	function hello(temp){
		temp=JSON.parse(temp)
		// to remove &nbsp from string otherwise date string can not be parsed to date object
		var target = new Date (temp[0].trim().replace(/\u00a0/g," ").replace(/\|/,""));
		given=new Date();
		console.log((given.getTime()/1000),(target.getTime()/1000))
		if ((given.getTime()/1000) >= (target.getTime()/1000) && (given.getTime()/1000) <= (target.getTime()/1000)+1800){
			location.href="https://muhamad-ammar.github.io/#"+temp[1];	
		}
		else
			alert("Not right time")		
	}
</script>
</html>
