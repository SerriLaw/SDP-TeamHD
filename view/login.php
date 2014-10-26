
<html>
	<head>
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>

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
									if (data == "FAILURE")
									{
										console.log("failure");
										$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
									}else if (data.indexOf("SUCCESS") > -1)
									{
										$("#error").html("<span style='color:#cc0000'>YAY. ");
										$("#login").val('Please wait ...');
										console.log("about to redirect");
										window.location.href = "home.php"; //urled
									}else{
										console.log(data);
										console.log(data == 'SUCCESS');
										$("#error").html("<span style='color:#cc0000'>Error:</span> Internal error 1. ");
									}
									$("#login").val('Login');
								}
								else
								{
									$("#login").val('Login');
									console.log("help");
									$("#error").html("<span style='color:#cc0000'>Error:</span> Internal error 2. ");

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
        <?php include("menu.php"); ?>
		<div id="wrap">
			<form action="" method="post">
			<span class="textfield">User ID: <input type="text" id="username"></span>
			<span class="textfield">Password: <input type="password" id="password"></span>
			<input type="submit" value="Login" id="login" class="formButton">
			<div id="error"></div>
			</form>
		</div>
	</body>
</html>