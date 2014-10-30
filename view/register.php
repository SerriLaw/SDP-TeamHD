
<html>
	<head>
		<title>BeanSprouts - Register</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#register').click(function(event)
			{
			event.preventDefault();
			var studentID=$("#studentID").val();
			var firstName=$("#firstName").val();
			var lastName=$("#lastName").val();
			var email=$("#email").val();
			var phone=$("#phone").val();
			var password=$("#password").val();
			var dateOfBirth=$("#dateOfBirth").val();
			var gender = $('input:radio[name=gender]:checked').val();
			var courseID=$("#courseID").val();
			var skills=$("#skills").val();
			var experience=$("#experience").val();

			var dataString = 'studentID='+studentID+'&firstName='+firstName+'&lastName='+lastName+'&email='+email+'&phone='+phone+'&password='+password+'&dateOfBirth='+dateOfBirth+'&gender='+gender+'&courseID='+courseID+'&skills='+skills+'&experience='+experience;
			if($.trim(studentID).length>0 && $.trim(firstName).length>0 && $.trim(lastName).length>0 && $.trim(email).length>0 && $.trim(phone).length>0 && $.trim(password).length>0 && $.trim(dateOfBirth).length>0 && $.trim(gender).length>0 && $.trim(courseID).length>0 && $.trim(skills).length>0 && $.trim(experience).length>0)
			{
				console.log("not empty");
			$.ajax({
			type: "POST",
			url: "/SDP/model/register.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#createEvent").val('Registering...');},
			success: function(data){
			if(data)
			{
				if(data == "EXISTS"){
					$("#error").html("<span style='color:#cc0000'>Error:</span> The userID and/or email already exists. ");
				}
				else if (data == "FAILURE") {
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Sever Error");
				}else{
					window.location.href = "/SDP/view/login.php";
				}
			
			}
			else
			{
			$("#createEvent").val('Register');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
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
			<div class="heroname">Register</div>
			<form action="" method="post">
				Student ID: <input type="text" id="studentID"> <br>
				First Name: <input type="text" id="firstName"> <br>
				Last Name: <input type="text" id="lastName"> <br>
				Email Address: <input type="text" id="email"> <br>
				Phone Number: <input type="text" id="phone"> <br>
				Password: <input type="password" id="password"> <br>
				Date of Birth: <input type="date" id="dateOfBirth"> <br>
				Gender: <br>
				<input type="radio" name="gender" value="m"> Male <br>
				<input type="radio" name="gender" value="f"> Female <br>
				Course: <select id="courseID">
							<?php 
								include("model/db.php");
								$sql = "SELECT * FROM course";
								$result = mysqli_query($db, $sql);
								while($row = mysqli_fetch_array($result))
								{
									echo "<option value=\"" . $row['courseID'] . "\">" . $row['name'] . "</option>";
								}

							?>
						</select> <br>
				Skills: <textarea id="skills"></textarea> <br>
				Experience: <textarea id="experience"></textarea> <br> <br>
				<div class="input"><input type="submit" value="Register" id="register" class="formButton"></div>
				<div id="error"></div>
			</form>
			<div class="footer">
		    	<img src="view/img/image-green.png" alt="BeanSprouts Footer">
		    	<br>
		    	<i class="fa fa-copyright"></i> BeanSprouts 2014
		    </div>
		</div>

	</body>
</html>