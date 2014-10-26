<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
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
		<div id="eventID">Event ID: <?php echo($row['eventID']); ?></div> <br>
		<div id="name">Event Name: <?php echo($row['name']); ?></div> <br>
		<div id="description">Event Description: <?php echo($row['description']); ?></div> <br>
		<div id="startDate">Event Start Date: <?php echo($row['startDate']); ?></div> <br>
		<div id="endDate">Event End Date: <?php echo($row['endDate']); ?></div> <br>
		<div id="location">Event Location: <?php echo($row['location']); ?></div> <br>
        
        
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
