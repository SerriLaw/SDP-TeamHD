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
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
			<span id="ham"><a href="#" onClick="$('.h').toggle()"><i class="fa fa-bars"></i></a></span>
			<ul>
				<li><a href=""><img src="img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
				<li class="h"><a href="login.php">Login</a></li>
				<li class="h"><a href="">Register</a></li>
				<li class="h"><a href="">View Events</a></li>
			</ul>
			
		</div>

		<div id="wrap">
			<div id="hero"><img src="img/icon.png" alt="BeanSprouts" id="bigbean"><span id="bigbeantext">BeanSprouts</span></div>

			<form action="" method="post">
			<span class="textfield">User ID: <input type="text" id="username"></span><br>
			<span class="textfield">Password: <input type="text" id="password"></span><br>
			<input type="submit" value="Login" id="login" class="formButton">
			<div id="error"></div>
			</form>
		</div>
	</body>
</html>