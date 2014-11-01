
<html>
	<head>
		<title>BeanSprouts - Edit Profile</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
				if(data.indexOf("ERROR") > -1){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Server Error");
				}
				else if (data.indexOf("SUCCESS") > -1) {
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
        <div id="wrap">
		<div class="heroname">Edit Profile</div>
		<div id="error"></div>
			<form action="" method="post">
				<table>
					<tr class="input">
						<td class="label">User ID</td>
						<td class="field"><div id="userID"><?php echo($row['userID']); ?></div></td>
					</tr>
					<tr class="input">
						<td class="label">First Name</td>
						<td class="field"><input type="text" id="firstName" class="textbox" value="<?php echo($row['firstName']) ?>"></td>
					</tr>
					<tr class="input">
						<td class="label">Last Name</td>
						<td class="field"><input type="text" id="lastName" class="textbox" value="<?php echo($row['lastName']) ?>"></td>
					</tr>
					<tr class="input">
						<td class="label">Email</td>
						<td class="field"><input type="text" id="email" class="textbox" value="<?php echo($row['email']) ?>"></td>
					</tr>


					<tr class="input">
						<td class="label">Phone Number</td>
						<td class="field"><input type="text" id="phone" class="textbox" value="<?php echo($row['phone']) ?>"></td>
					</tr>

					<tr class="input">
						<td class="label">Password</td>
						<td class="field"><input type="password" id="password" class="textbox" value="<?php echo($row['password']) ?>"></td>
					</tr>

					<tr class="input">
						<td class="label">Date of Birth</td>
						<td class="field"><input type="date" id="dateOfBirth" value="<?php echo($row['DOB']) ?>"></td>
					</tr>

					<tr class="input">
						<td class="label">Gender</td>
						<td class="field">
							<input type="radio" name="gender" value="m" <?php if($row['gender'] == "m"){echo('checked="checked"');} ?>> Male <br>
							<input type="radio" name="gender" value="f" <?php if($row['gender'] == "f"){echo('checked="checked"');} ?>> Female 
						</td>
					</tr>
					<?php if($row['userType'] < 2){?>
					<tr class="input">
						<td class="label">Course</td>
						<td class="field">
							<select id="courseID">
								<?php 
									$sql5 = "SELECT * FROM course";
									$result5 = mysqli_query($db, $sql5);
									while($row5 = mysqli_fetch_array($result5))
									{
										echo "<option value=\"" . $row5['courseID'] . "\">" . $row5['name'] . "</option>";
									}

								?>
							</select>
						</td>
					</tr>

					<tr class="input">
						<td class="label">Skills</td>
						<td class="field"><textarea id="skills"><?php echo($row['skills']); ?></textarea></td>
					</tr>

					<tr class="input">
						<td class="label">Experience</td>
						<td class="field"><textarea id="experience"><?php echo($row['experience']) ;?></textarea></td>
					</tr>
					<?php } ?>


					<?php if($row['userType'] > 1){?>
					<tr class="input">
						<td class="label">Department</td>
						<td class="field"><input type="text" id="department" class="textbox"  value="<?php echo($row['department']) ?>"></td>
					</tr>

					<tr class="input">
						<td class="label">Role</td>
						<td class="field"><input type="text" id="role" class="textbox"  value="<?php echo($row['role']) ?>"></td>
					</tr>
					<?php }?>
					
					<tr class="input">
						<td colspan="2"><input type="submit" value="Save Profile" id="editProfile" class="formButton"></td>
					</tr>
					
					
				</table>








				
				
				
			
			</form>
			<div class="footer">
				<img src="view/img/image-green.png" alt="BeanSprouts Footer">
				<br>
				<i class="fa fa-copyright"></i> BeanSprouts 2014
			</div>
		</div>

	</body>
</html>