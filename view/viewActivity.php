
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
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
		<div id="activityID">Activity ID: <?php echo($row['activityID']); ?></div> <br>
		<div id="name">Activity Name: <?php echo($row['name']); ?></div> <br>
		<div id="description">Activity Description: <?php echo($row['description']); ?></div> <br>
		<div id="location">Event Location: <?php echo($row['location']); ?></div> <br>
		<div id="startDate">Activity Start Date: <?php echo($row['startDate']); ?></div> <br>
		<div id="endDate">Activity End Date: <?php echo($row['endDate']); ?></div> <br>
		<div id="endDate">Activity Start Time: <?php echo($row['startTime']); ?></div> <br>
		<div id="endDate">Activity End Time: <?php echo($row['endTime']); ?></div> <br>
		<?php 
        //MODIFY THE LINK FOR DELETE,UPDATE, & REGISTER USING AJAX
        if(!empty($_SESSION))
        if($_SESSION['userType'] == 2){ ?>
        <a id="deleteActivity" href="/SDP/model/deleteActivityCheck.php?activityid=<?php echo($row['activityID']); ?>">Delete</a>
        <a href="/SDP/updateActivity.php?activityid=<?php echo($row['activityID']); ?>">Update</a>
        <div id="deleteActivityMessage"></div>
        <?php } ?>
        
            <h1>Role</h1>
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
					$link44 = ">View Role</a>";
					echo($row1['name'] . " " . $link11 . $link22 .  $link33 . $_GET['managerid'] .  $link44 . "<br><br>" );
				}
			}
		?>

        
		<?php 
			if(!empty($_SESSION))
			if ($_SESSION['userID'] == $_GET['managerid']) 
			{
				
				$link1 = "<a href=createRole.php?activityid="; 
				$link2 = "&managerid=";
				$link3= ">Create Role</a>";
				echo($link1.$row['activityID'].$link2.$_GET['managerid'].$link3);

			}
		?>  
    </body>

</html>