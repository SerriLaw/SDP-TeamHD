<html>
	<head>
		<title>BeanSprouts - View Role</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#deleteRole').click(function(event)
			{
			event.preventDefault();
			var roleID=<?php echo($row['roleID']); ?>;

			var dataString = 'roleID='+roleID;
			console.log(dataString);
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/deleteRoleCheck.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#deleteRoleMessage").val('Deleting...');},
			success: function(data){
			if(data)
			{
				if(data == "FINISHED"){
					$("#deleteRoleMessage").html("<span style='color:#cc0000'>Error:</span> The Role has already passed. ");
				}
				else if (data == "ATTACHED") {
					$("#deleteRoleMessage").html("<span style='color:#cc0000'>Warning:</span> There is an applicant and/or volunteer attached do you want to proceed? <a href='/SDP/model/deleteRole.php?roleid="+roleID+"'>DELETE</a>");
				}
				else if (data == "DELETED") {
					window.location.href = "/SDP/home.php";
				}
				else{
					console.log(data);
					$("#deleteRoleMessage").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
				}
			
			}
			}
			});
			return false;
			});

			});						
		</script>
		<script>
			$(document).ready(function() {
			    dateFormat("#date1")
			});
		</script>
	</head>




	<body>
        <?php include("menu.php"); ?>
        <?php include("./model/isActive.php"); ?>

        <div id="wrap">
        	<div class="role-details">
				<div id="name"><?php echo($row['name']); ?></div>

				<div id="startDate"><i class="fa fa-calendar"></i> <span id="date1"><?php echo($row1['date']); ?></span></div>
				<div id="startTime"><span class="role-time"><i class="fa fa-clock-o"></i> Starts <?php echo($row1['startTime']); ?></span></div>
				<div id="endTime"><span class="role-time"><i class="fa fa-clock-o"></i> Ends <?php echo($row1['endTime']); ?></span></div>

				<div id="paid">Paid: <?php if($row['isPaid'] == 1){echo("Yes");}else{echo("No");} ?><div id="rate"> Rate: $<?php echo($row['rate']); ?> / hr</div></div>
				<div id="requirements">Requirements: <?php echo($row['requirements']); ?></div>
				<div id="description">Description: <?php echo($row['description']); ?></div>
				
			

				<div class="role-edit">
					<?php 
			        //MODIFY THE LINK FOR DELETE,UPDATE, & REGISTER USING AJAX
			        if(!empty($_SESSION))
			        if($_SESSION['userType'] == 2){ ?>

			    	<a href="/SDP/updateRole.php?roleid=<?php echo($row['roleID']); ?>"><i class="fa fa-pencil-square-o"></i> Edit Role</a><br>
			        <a id="deleteRole" href="/SDP/model/deleteRoleCheck.php?roleid=<?php echo($row['roleID']); ?>"><i class="fa fa-trash-o"></i> Delete Role</a>
			        
			        <div id="deleteRoleMessage"></div>
			        <?php } ?>
			    </div>	

			</div>
			
			<div class="role-applicant">

				<?php
					//IF the person who made this Role is the person looking at it, Echo out every applicant and allow and a button to select them for the role.
					$sql2 = "SELECT managerID from event WHERE eventID =  (SELECT eventID FROM activity WHERE activityID = (SELECT activityID FROM role WHERE roleID = "  . $row['roleID'] . "))";
					$result2 = mysqli_query($db, $sql2);
					$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
					if(!empty($_SESSION))
					if($_SESSION['userID'] == $row2['managerID']) //If you are the manager who made this event
					{
						echo("<div class=\"role-applicant-head\">Applicant List</div>");
						$sql3 = "SELECT * FROM application WHERE roleID = " . $row['roleID']." AND status = 0"; //Only display the status 0
						$result3 = mysqli_query($db, $sql3);

						while($row3 = mysqli_fetch_array($result3)) 
						{
							$sql4 = "SELECT firstName, lastName FROM user WHERE userID = " . $row3['userID'];
							$result4 = mysqli_query($db, $sql4);
							$row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
							echo $row3['userID'] . " " .$row4['firstName'] . " " . $row4['lastName'] . " Date Submitted " . $row3['dateSubmitted'] . " <a href = \"/SDP/model/approve.php?appid=".$row3['userID']."&roleid=".$row1['roleID']."\">Approve</a>" ." - <a href = \"/SDP/model/ignore.php?appid=".$row3['userID']."&roleid=".$row1['roleID']."\">Ignore</a><br>";
						}
		                
		                echo("<div class=\"role-applicant-head\">Approve List</div>");
						$lqs3 = "SELECT * FROM application WHERE roleID = " . $row['roleID']." AND status = 1"; //Only display the status 0
						$result3 = mysqli_query($db, $lqs3);

						while($row3 = mysqli_fetch_array($result3)) 
						{
							$sql4 = "SELECT firstName, lastName FROM user WHERE userID = " . $row3['userID'];
							$result4 = mysqli_query($db, $sql4);
							$row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
							echo $row3['userID'] . " " .$row4['firstName'] . " " . $row4['lastName'] . " Date Submitted " . $row3['dateSubmitted'] . " <a href = \"/SDP/model/deAllocate.php?appid=".$row3['userID']."&roleid=".$row1['roleID']."\">De-Allocate</a>";
						}
		                
					}
					elseif ($row['isPaid'] == 1 && $_SESSION['userType'] == 1) //the role is paid and the user is a sprout 
					{
						echo("<a href = \"/SDP/model/applyRole.php?roleid=" . $row['roleID'] . "\"> Apply </a> ");
					}
					elseif ($row['isPaid'] == 0 && $_SESSION['userType'] < 2) //the role is non-paid and the user is a sprout or volunteer 
					{
						echo("<a href = \"/SDP/model/applyRole.php?roleid=" . $row['roleID'] . "\"> Apply </a> ");
					}
				?>
			</div>

		</div>
	</body>
</html>