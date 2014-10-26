<html>
	<head>
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/main.min.css">
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script src="/SDP/view/js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#deleteEvent').click(function(event)
			{
			event.preventDefault();
			var eventID=<?php echo($row['eventID']); ?>;


			var dataString = 'eventID='+eventID;
			console.log(dataString);
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/deleteEventCheck.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#deleteEventMessage").val('Delteing...');},
			success: function(data){
			if(data)
			{
				if(data == "FINISHED"){
					$("#deleteEventMessage").html("<span style='color:#cc0000'>Error:</span> The event has already passed. ");
				}
				else if (data == "ACTIVITY") {
					$("#deleteEventMessage").html("<span style='color:#cc0000'>Warning:</span> There is an activity and/or role and/or volunteer attached do you want to proceed? <a href='/SDP/model/deleteEvent.php?eventid="+eventID+"'>DELETE</a>");
				}
				else if (data == "DELETED") {
					window.location.href = "/SDP/home.php";
				}
				else{
					console.log(data);
					$("#deleteEventMessage").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
				}
			
			}
			}
			});
			return false;
			});

			});						
		</script>
	</head>
	<body>
        <?php include("menu.php"); ?>
        <?php include("./model/isActive.php"); ?>
        <div id="wrap">

			<div id="hero">
				<img src="img/BeanSprouts_large.png" alt="BeanSprouts Event" id="eventimg">
				<div id="name"><?php echo($row['name']); ?></div>
			</div>

			<div id="container">
				
				<div id="startDate" class="date"><i class="fa fa-calendar"></i> Event Starts: <span id="date1"><?php echo($row['startDate']); ?></span></div>
				<div id="endDate" class="date"><i class="fa fa-calendar"></i> Event Ends: <?php echo($row['endDate']); ?></div>
				<div id="location"><?php echo($row['location']); ?></div>

				<div id="description"><?php echo($row['description']); ?></div>
			</div>
        </div>
        
        <?php 
        //MODIFY THE LINK FOR DELETE,UPDATE, & REGISTER USING AJAX
        if(!empty($_SESSION))
        if($_SESSION['userType'] == 2){ ?>
        <a id="deleteEvent" href="/SDP/model/deleteEventCheck.php?eventid=<?php echo($row['eventID']); ?>">Delete</a>
        <a href="/SDP/updateEvent.php?id=<?php echo($row['eventID']); ?>">Update</a>
        <div id="deleteEventMessage"></div>
        <?php } ?>
        <?php if(!empty($_SESSION))if($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1 ){ ?>
        <a href="/SDP/createEvents.php">Register</a>
        <?php } 
        ?>

        
        <h1>Activities</h1>
		<?php 
			$sql = "SELECT * FROM activity WHERE eventID = " . $row['eventID'];
			$result = mysqli_query($db, $sql);
			while($row1 = mysqli_fetch_array($result))
			{
				if($row1['isActive'] == 1)
				{
				$link11 = "<a href=viewActivity.php?activityid=";
				$link22 = $row1['activityID'];
				$link33= "&managerid="; 
				$link44 = ">View Activity</a>";
				echo($row1['name'] . " " . $link11 . $link22 .  $link33 . $row['managerID'] .  $link44 . "<br><br>" );
				}
			}
		?>
		<?php 
			if(!empty($_SESSION))
			if ($_SESSION['userID'] == $row['managerID']) 
			{
				
				$link1 = "<a href=createActivity.php?eventid="; 
				$link2 = "&managerid=";
				$link3= ">Create Activity</a>";
				echo($link1.$row['eventID'].$link2.$row['managerID'].$link3);

			}
		?>
        
	</body>
	</body>
</html>
