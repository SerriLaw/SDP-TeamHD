<html>
	<head>
		<title>BeanSprouts - Profile</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#deleteProfile').click(function(event)
			{
			event.preventDefault();
			var userID=$("#userID").text();
			var userType=<?php echo $_SESSION['userID'] ?>;

			var dataString = 'userID='+userID+'&userType='+userType;
			console.log(dataString);
			if($.trim(userID).length>0 && $.trim(userType).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/deleteProfileCheck.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#deleteProfile").val('Deleting...');},
			success: function(data){
			if(data)
			{
				if(data == "SQLFAILURE"){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
				}
				else if (data == "FAILURE") {
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error.");
				}else if (data == "CURRENT") {
					$("#error").html("<span style='color:#cc0000'>Error:</span> The user is involved with a current event.");
				}else if (data == "SUCCESS") {
					$("#deleteActivityMessage").html("<span style='color:#cc0000'>Warning:</span> Are you sure you want to procede? <a href='/SDP/model/deleteProfile.php?userid="+userID+ "&userType=" +userType "'>DELETE</a>");
				}
			
			}
			else
			{
			$("#createEvent").val('Create Event');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			}
			});

			}
			return false;
			});

			});						
		</script>
	</head>
	<body>
        <?php include("menu.php"); ?>
        <div id="wrap">
			<div class="heroname"><?php echo($row['firstName']); ?> <?php echo($row['lastName']); ?></div>
			<div class="person-data">
				<span><?php echo($row['firstName']); ?>'s Details</span>
				<div id="firstName">First Name: <?php echo($row['firstName']); ?></div>
				<div id="lastName">Last Name: <?php echo($row['lastName']); ?></div>

				<div id="userID">User ID: <?php echo($row['userID']); ?></div>
				

				<div id="gender">Gender: <?php echo($gender); ?></div>
				<div id="dateOfBirth">Date of Birth: <?php echo($row['DOB']); ?></div>
			</div>
			<div class="contact">
				<span>Contact <?php echo($row['firstName']); ?></span>
				
				<div id="email"><a href"mailto:<?php echo($row['email']); ?>"><i class="fa fa-envelope-o"></i> <?php echo($row['email']); ?></a></div>
				<div id="phone"><a href="<?php echo($row['phone']); ?>"><i class="fa fa-phone"></i>  <?php echo($row['phone']); ?></a></div>
			</div>
			
			<div class="system-user-data">
			<span>User Information</span>
			<div id="userType">User Type: <?php echo($userType) ?></div>
			<?php 
				if($row['userType'] < 2)
				{
					echo(
							"<div id=\"skills\">Skills: " .$row['skills'] . "</div><br>" .
							"<div id=\"experience\">Experience: " . $row['experience'] . "</div><br>" .
							"<div id=\"course\">Course: " . $row1['name'] . "</div><br>"
						);
				}
				else
				{
					echo(
							"<div id=\"department\">Department: " . $row['department']. "</div><br>" .
							"<div id=\"role\">Role: " . $row['role'] . "</div><br>"
						);
				}
				if($row['userID'] == $_SESSION['userID'] || $_SESSION['userID'] > 2)
				{
					echo('<a href="/SDP/editProfile.php?userid=' . $row['userID'] . '&usertype=' . $row['userType'] .'"><i class="fa fa-pencil-square-o"></i> Edit Profile</a><br>');
					echo('<a href="/SDP/model/deleteProfile.php"><i class="fa fa-trash-o"></i> Delete Profile</a><br>');
				}
			?>
			</div>
		</div>

	</body>
</html>