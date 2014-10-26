
<html>
	<head>
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
		<form action="" method="post">
		User ID: <input type="text" id="username"><br>
		Password: <input type="text" id="password"><br>
		<input type="submit" value="Login" id="login">
		<div id="error"></div>
		</form>
	</body>
</html>