<?php
	session_start();
	//if already logged in redirects user to the dashboard
	if(!empty($_SESSION['login_user']))
	{
		header('Location: /SDP/view/dashboard.php'); //urled
	}
?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.min.css">

		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		console.log("started");
			$(document).ready(function() 
			{
				console.log("step 1");
				$('#login').click(function(event)
				{
					event.preventDefault();
					console.log("setting variables");
					var username=$("#username").val();
					var password=$("#password").val();
					var dataString = 'username='+username+'&password='+password;
					console.log("variables set");
					if($.trim(username).length>0 && $.trim(password).length>0)
					{
						console.log("username and password populated");
						$.ajax({
							type: "POST",
							url: "/SDP/model/login.php", //urled
							data: dataString,
							cache: false,
							beforeSend: function(){ $("#login").val('Connecting...');},
							success: function(data){
								if(data)
								{
									console.log(data);
									if (data == "FAILURE")
									{
										$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
									}else if (data == "SUCCESS")
									{
										$("#error").html("<span style='color:#cc0000'>YAY. ");
										$("#login").val('Please wait ...');
										window.location.href = "/SDP/view/dashboard.php"; //urled
									}else{
										$("#error").html("<span style='color:#cc0000'>Error:</span> Internal error. ");
									}
									$("#login").val('Login');
								}
								else
								{
									$("#login").val('Login');
									$("#error").html("<span style='color:#cc0000'>Error:</span> Internal error. ");
								}
							}
						});

					}else{
						$("#error").html("<span style='color:#cc0000'>Error:</span> Please enter your username and password. ");
					}
					return false;
				});

			});						
		</script>
	</head>
	<body>

		<div id="nav-bar">
			<ul>
				<li><img src="img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></li>
				<li>Login</li>
				<li>Register</li>
				<li>View Events</li>
			</ul>
			
		</div>


		<form action="" method="post">
		User ID: <input type="text" id="username"><br>
		Password: <input type="text" id="password"><br>
		<input type="submit" value="Login" id="login">
		<div id="error"></div>
		</form>
	</body>
</html>