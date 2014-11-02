
<html>
	<head>
		<title>BeanSprouts - Add Manager</title>
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
			var userID=$("#userID").val();
			var firstName=$("#firstName").val();
			var lastName=$("#lastName").val();
			var email=$("#email").val();
			var phone=$("#phone").val();
			var password=$("#password").val();
			var dateOfBirth=$("#dateOfBirth").val();
			var gender = $('input:radio[name=gender]:checked').val();
			var department=$("#department").val();
			var role=$("#role").val();

			var dataString = 'userID='+userID+'&firstName='+firstName+'&lastName='+lastName+'&email='+email+'&phone='+phone+'&password='+password+'&dateOfBirth='+dateOfBirth+'&gender='+gender+'&department='+department+'&role='+role;
			if($.trim(userID).length>0 && $.trim(firstName).length>0 && $.trim(lastName).length>0 && $.trim(email).length>0 && $.trim(phone).length>0 && $.trim(password).length>0 && $.trim(dateOfBirth).length>0 && $.trim(gender).length>0 && $.trim(department).length>0 && $.trim(role).length>0)
			{
				console.log("not empty");
			$.ajax({
			type: "POST",
			url: "/SDP/model/createManager.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#register").val('Creating...');},
			success: function(data){
			if(data)
			{
				if(data.indexOf("EXISTS") > -1){
					$("#error").html("<span style='color:#cc0000'>Error:</span> The userID and/or email already exists. ");
				}
				else if (data.indexOf("FAILURE") > -1)  {
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Sever Error");
				}else if (data.indexOf("SUCCESS") > -1){
					window.location.href = "/SDP/managerList.php";
				}
			
			}
			else
			{
			$("#register").val('Create');
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
			<div class="heroname">Add Event Manager</div>
			<div id="error"></div>

			<form action="" method="post">

				<table>
					<tr class="input">
						<td class="label">UTS Staff ID</td>
						<td class="field"><input type="text" class="textbox hasMax" id="userID" placeholder="e.g. 12345678" friendly="Staff ID" max-val="10"></td>
					</tr>
					<tr class="input">
						<td class="label">First Name</td>
						<td class="field"><input type="text" class="textbox hasMax lha" id="firstName" placeholder="e.g. Josh" friendly="First Name" max-val="20"></td>
					</tr>
					<tr class="input">
						<td class="label">Last Name</td>
						<td class="field"><input type="text" class="textbox hasMax lha" id="lastName" placeholder="e.g. Lo" friendly="Last Name" max-val="20"></td>
					</tr>
					<tr class="input">
						<td class="label">Email</td>
						<td class="field"><input type="text" class="textbox hasMax emailSign" id="email" placeholder="e.g. joshlo@email.com" friendly="Email" max-val="30"></td>
					</tr>

					<tr class="input">
						<td class="label">Phone Number</td>
						<td class="field"><input type="text" class="textbox hasMax numOnly" id="phone" placeholder="e.g. 0412345678" friendly="Phone number" max-val="10"></td>
					</tr>
					<tr class="input">
						<td class="label">Password</td>
						<td class="field"><input input type="password" id="password" class="textbox hasMax" friendly="Password" max-val="20"></td>
					</tr>
					<tr class="input">
						<td class="label">Date of Birth</td>
						<td class="field"><input type="date" class="dateReg notLaterThanToday" id="dateOfBirth" friendly="Date of birth"></td>
					</tr>
					<tr class="input">
						<td class="label">Gender</td>
						<td class="field">
							<input type="radio" name="gender" value="m"> Male <br>
							<input type="radio" name="gender" value="f"> Female <br>
						</td>
					</tr>
					<tr class="input">
						<td class="label">Department</td>
						<td class="field"><input type="text" class="textbox hasMax" id="department" placeholder="e.g. FEIT" friendly="Department" max-val="10"></td>
					</tr>
					<tr class="input">
						<td class="label">Role</td>
						<td class="field"><input type="text" class="textbox hasMax" id="role" placeholder="e.g. Marketing Officer" friendly="Role" max-val="20"></td>
					</tr>
					
					
				</table>
				
				<div class="input"><input type="submit" value="Create" id="register" class="formButton subBtn"></div>
				
			</form>
			<div class="footer">
		    	<img src="view/img/image-green.png" alt="BeanSprouts Footer">
		    	<br>
		    	<i class="fa fa-copyright"></i> BeanSprouts 2014
		    </div>
		</div>

	</body>
</html>