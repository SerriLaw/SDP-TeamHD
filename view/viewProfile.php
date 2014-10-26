
<html>
	<head>
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
		<h1><?php echo($userName); ?></h1>
		<div id="userID">User ID:<?php echo($row['userID']); ?></div><br>
		<div id="userType">User Type:<?php echo($userType) ?></div><br>
		<div id="gender">Gender: <?php echo($gender); ?></div><br>
		<div id="firstName">First Name: <?php echo($row['firstName']); ?></div><br>
		<div id="lastName">Last Name: <?php echo($row['lastName']); ?></div><br>
		<div id="email">Email: <?php echo($row['email']); ?></div><br>
		<div id="phone">Phone: <?php echo($row['phone']); ?></div><br>
		<div id="dateOfBirth">Date of Birth: <?php echo($row['DOB']); ?></div><br>

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
				echo('<a href="/SDP/editProfile.php?userid=' . $row['userID'] . '&usertype=' . $row['userType'] .'">Edit Profile</a><br>');
				echo('<a href="/SDP/model/deleteProfile.php">Delete Profile</a><br>');
			}
		?>

	</body>
</html>