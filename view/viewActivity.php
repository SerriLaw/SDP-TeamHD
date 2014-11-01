<html>
	<head>
		<title>BeanSprouts - View Activity</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#deleteActivity').click(function(event)
			{
			event.preventDefault();
			var activityID=<?php echo($row['activityID']); ?>;

			var dataString = 'activityID='+activityID;
			console.log(dataString);
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/deleteActivityCheck.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#deleteActivityMessage").val('Deleting...');},
			success: function(data){
			if(data)
			{
				if(data == "FINISHED"){
					$("#deleteActivityMessage").html("<span style='color:#cc0000'>Error:</span> The Activity has already passed. ");
				}
				else if (data == "ROLE") {
					$("#deleteActivityMessage").html("<span style='color:#cc0000'>Warning:</span> There is an a role and/or volunteer attached do you want to proceed? <a href='/SDP/model/deleteActivity.php?activityid="+activityID+"'>DELETE</a>");
				}
				else if (data == "DELETED") {
					window.location.href = "/SDP/home.php";
				}
				else{
					console.log(data);
					$("#deleteActivityMessage").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
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
	        <div class="act-details">
				<div id="name"><?php echo($row['name']); ?></div>
				<div id="startDate"><i class="fa fa-calendar"></i> Starts <span class="dateToForm"><?php echo($row['startDate']); ?></span>
					<span class="act-time"><i class="fa fa-clock-o"></i> Time: <span class="timeToForm"><?php echo($row['startTime']); ?></span></span>
				</div>
				
				<div id="endDate"><i class="fa fa-calendar"></i> Ends <span class="dateToForm"><?php echo($row['endDate']); ?></span>
					<span class="act-time"><i class="fa fa-clock-o"></i> Time: <span class="timeToForm"><?php echo($row['endTime']); ?></span></span>
				</div>
				
				
				<div id="location"><i class="fa fa-map-marker"></i> <?php echo($row['location']); ?></div> <br>
				<div id="description"><?php echo($row['description']); ?></div>
				
				

				<div class="act-edit">
					<?php 
			        //MODIFY THE LINK FOR DELETE,UPDATE, & REGISTER USING AJAX
			        if(!empty($_SESSION))
			        if($_SESSION['userType'] > 1){ ?>

			    	<a href="/SDP/updateActivity.php?activityid=<?php echo($row['activityID']); ?>"><i class="fa fa-pencil-square-o"></i> Edit Activity</a><br>
			        <a id="deleteActivity" href="/SDP/model/deleteActivityCheck.php?activityid=<?php echo($row['activityID']); ?>"><i class="fa fa-trash-o"></i> Delete Activity</a>
			        
			        <div id="deleteActivityMessage"></div>
			        <?php } ?>
			    </div>
			</div>
	        
	        <div class="event-activity">
	        	<div class="event-activity-head">Roles</div>

				<?php 
					$sql = "SELECT * FROM role WHERE activityID = " .$row['activityID'];
					$result = mysqli_query($db, $sql);
					while($row1 = mysqli_fetch_array($result))
					{
						if($row1['isActive'] == 1)
						{
							$link11 = "<a href=viewRole.php?roleid=";
							$link22 = $row1['roleID'];
							$link33= "&managerid="; 
							$link44 = "> &nbsp; <i class=\"fa fa-share\"></i> View Role</a>";
							echo($row1['name'] . " " . $link11 . $link22 .  $link33 . $_GET['managerid'] .  $link44 . "<br><br>" );
						}
					}
				?>

		        
				<?php 
					if(!empty($_SESSION))
					if ($_SESSION['userID'] == $_GET['managerid']) 
					{
						
						$link1 = "<div class=\"event-activity-edit\"><a href=createRole.php?activityid="; 
						$link2 = "&managerid=";
						$link3= "><i class=\"fa fa-plus\"></i> Add Role</a></div>";
						echo($link1.$row['activityID'].$link2.$_GET['managerid'].$link3);

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