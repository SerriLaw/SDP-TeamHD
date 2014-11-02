<html>
	<head>
		<title>BeanSprouts - View Event</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
				<img src="view/img/BeanSprouts_large.png" alt="BeanSprouts Event" id="eventimg">
				<div id="name"><?php echo($row['name']); ?></div>
			</div>

			<div class="event-details">
				<div id="startDate" class="date"><i class="fa fa-calendar"></i> Starts <span class="dateToForm"><?php echo($row['startDate']); ?></span>
					<span class="act-time"><i class="fa fa-clock-o"></i> Time: <span class="timeToForm"><?php echo($row['startTime']); ?></span></span>
				</div>
				<div id="endDate" class="date"><i class="fa fa-calendar"></i> Ends <span class="dateToForm"><?php echo($row['endDate']); ?></span>
					<span class="act-time"><i class="fa fa-clock-o"></i> Time: <span class="timeToForm"><?php echo($row['endTime']); ?></span></span>
				</div>
				<div id="location"><i class="fa fa-map-marker"></i> <?php echo($row['location']); ?></div>

				<div id="description"><?php echo($row['description']); ?></div>

				<div class="event-edit">
					<?php 
					//MODIFY THE LINK FOR DELETE,UPDATE, & REGISTER USING AJAX
					if(!empty($_SESSION))
					if($_SESSION['userType'] > 1){ ?>	
					<a href="/SDP/updateEvent.php?id=<?php echo($row['eventID']); ?>"><i class="fa fa-pencil-square-o"></i> Edit Event</a><br>
					<a id="deleteEvent" href="/SDP/model/deleteEventCheck.php?eventid=<?php echo($row['eventID']); ?>"><i class="fa fa-trash-o"></i> Delete Event</a><br>
					<div id="deleteEventMessage"></div>
					<?php } ?>
				</div>
			</div>
        
			<div class="event-activity">
				<div class="event-activity-head">Activities</div>

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
							$link44 = "> &nbsp; <i class=\"fa fa-share\"></i> View Activity</a>";
							echo($row1['name'] . " " . $link11 . $link22 .  $link33 . $row['managerID'] .  $link44 . "<br><br>" );
						}
					}
				?>

				<?php 
					if(!empty($_SESSION))
					if ($_SESSION['userID'] > 1) 
					{
						
						$link1 = "<div class=\"event-activity-edit\"><a href=createActivity.php?eventid="; 
						$link2 = "&managerid=";
						$link3= "><i class=\"fa fa-plus\"></i> Add Activity</a></div>";
						echo($link1.$row['eventID'].$link2.$row['managerID'].$link3);

					}
				?>
				
			</div>   
			<div class="footer">
				<img src="view/img/image-green.png" alt="BeanSprouts Footer">
				<br>
				<i class="fa fa-copyright"></i> BeanSprouts 2014
			</div>     
        </div>

	</body>
</html>


