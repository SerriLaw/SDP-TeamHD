
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#editProfile').click(function(event)
			{
			event.preventDefault();
			var userID=$("#userID").text();
			console.log(<?php echo($row['userID']); ?>);
			var userType=<?php echo($row['userType']); ?>;
			var firstName=$("#firstName").val();
			var lastName=$("#lastName").val();
			var email=$("#email").val();
			var phone=$("#phone").val();
			var password=$("#password").val();
			var dateOfBirth=$("#dateOfBirth").val();
			var gender = $('input:radio[name=gender]:checked').val();


			<?php if($row['userType'] < 2){?> // a student
				var courseID=$("#courseID").val();
				var skills=$("#skills").val();
				var experience=$("#experience").val();
				var dataString = 'userID='+userID+'&userType='+userType+'&firstName='+firstName+'&lastName='+lastName+'&email='+email+'&phone='+phone+'&password='+password+'&dateOfBirth='+dateOfBirth+'&gender='+gender+'&courseID='+courseID+'&skills='+skills+'&experience='+experience;
				if($.trim(firstName).length>0 && $.trim(lastName).length>0 && $.trim(email).length>0 && $.trim(phone).length>0 && $.trim(password).length>0 && $.trim(dateOfBirth).length>0 && $.trim(gender).length>0 && $.trim(courseID).length>0 && $.trim(skills).length>0 && $.trim(experience).length>0)
			{
			<?php }?>

			<?php if($row['userType'] > 1){?> //event mangager or admin
				var department=$("#department").val();
				var role=$("#role").val();
				var dataString = 'userID='+userID+'&userType='+userType+'&firstName='+firstName+'&lastName='+lastName+'&email='+email+'&phone='+phone+'&password='+password+'&dateOfBirth='+dateOfBirth+'&gender='+gender+'&department='+department+'&role='+role;
				if($.trim(firstName).length>0 && $.trim(lastName).length>0 && $.trim(email).length>0 && $.trim(phone).length>0 && $.trim(password).length>0 && $.trim(dateOfBirth).length>0 && $.trim(gender).length>0 && $.trim(department).length>0 && $.trim(role).length>0)
			{
			<?php }?>


			console.log("not empty");
			console.log(<?php echo($row['userID']); ?>);
			$.ajax({
			type: "POST",
			url: "/SDP/model/editProfile.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#editProfile").val('Editing...');},
			success: function(data){
			if(data)
			{
				console.log(data);
				if(data == "ERROR"){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Server Error");
				}
				else if (data == "SUCCESS") {
					window.location.href = "/SDP/viewProfile.php?userid=" + userID;
				}
				else{
					$("#error").html("<span style='color:#cc0000'>Error:</span> Your update was unresponsive");
				}
			
			}
			}
			});

			}
			else
			{
				$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill out all fields in the form");
			}
			return false;
			});

			});						
		</script>
	</head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Edit Profile</h1> 
		<form action="" method="post">
			User ID: <div id="userID"><?php echo($row['userID']); ?></div> <br>
			First Name: <input type="text" id="firstName" value="<?php echo($row['firstName']) ?>"> <br>
			Last Name: <input type="text" id="lastName" value="<?php echo($row['lastName']) ?>"> <br>
			Email Address: <input type="text" id="email" value="<?php echo($row['email']) ?>"> <br>
			Phone Number: <input type="text" id="phone" value="<?php echo($row['phone']) ?>"> <br>
			Password: <input type="password" id="password" value="<?php echo($row['password']) ?>"> <br>
			Date of Birth: <input type="date" id="dateOfBirth" value="<?php echo($row['DOB']) ?>"> <br>
			Gender: <br>
			<input type="radio" name="gender" value="m" <?php if($row['gender'] == "m"){echo('checked="checked"');} ?>> Male: <br>
			<input type="radio" name="gender" value="f" <?php if($row['gender'] == "f"){echo('checked="checked"');} ?>> Female: <br>
			<?php if($row['userType'] < 2){?>
			Course: <select id="courseID">
						<?php 
							$sql5 = "SELECT * FROM course";
							$result5 = mysqli_query($db, $sql5);
							while($row5 = mysqli_fetch_array($result5))
							{
								echo "<option value=\"" . $row5['courseID'] . "\">" . $row5['name'] . "</option>";
							}

						?>
					</select> <br>
			Skills: <textarea id="skills"><?php echo($row['skills']); ?></textarea> <br>
			Experience: <textarea id="experience"><?php echo($row['experience']) ;?></textarea> <br> <br>
			<?php } ?>
			<?php if($row['userType'] > 1){?>
			Department: <input type="text" id="department" value="<?php echo($row['department']) ?>"> <br>
			Role: <input type="text" id="role" value="<?php echo($row['role']) ?>"> <br>
			<?php }?>
			<input type="submit" value="Edit Profile" id="editProfile"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>