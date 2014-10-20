<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/view/login.php'); //urled
		die();
	}
?>
<html>
	<head>
		<title>BeanSprouts</title>
		<link rel="stylesheet" type="text/css" href="styles/main.min.css">
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script src="/SDP/view/js/script.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
			<script type="text/javascript">
			$(document).ready(function() {
				validateChar();

			    $('#createEvent').click(function(event) {
			        event.preventDefault();
			        var name = $("#name").val();
			        var description = $("#description").val();
			        var startDate = $("#startDate").val();
			        var endDate = $("#endDate").val();
			        var location = $("#location").val();
			        var managerID = <?php echo $_SESSION['userID'] ?>;

			        var dataString = 'name=' + name + '&description=' + description + "&startDate=" + startDate + "&endDate=" + endDate + "&location=" + location + "&managerID=" + managerID;
			        console.log(dataString);
			        if ($.trim(name).length > 0 && $.trim(description).length > 0 && $.trim(startDate).length > 0 && $.trim(endDate).length > 0 && $.trim(location).length > 0) {
			            console.log("fire");
			            $.ajax({
			                type: "POST",
			                url: "/SDP/model/createEvent.php",
			                data: dataString,
			                cache: false,
			                beforeSend: function() {
			                    $("#createEvent").val('Creating...');
			                },
			                success: function(data) {
			                    if (data) {
			                        if (data == "SQLFAILURE") {
			                            $("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
			                        } else if (data == "FAILURE") {
			                            $("#error").html("<span style='color:#cc0000'>Error:</span> LOLOLOLOL.");
			                        } else {
			                            console.log(data);
			                            window.location.href = "/SDP/view/viewEvent.php?eventid=" + data;
			                        }

			                    } else {
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
		<script>

		</script>
		
	<head>
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
			<h1>Create an Event</h1>
			<form action="" method="post">
				Event Name: <input type="text" id="name"> <br>
				<span class="errormsg" id="nameErr">Name has too many characters. Max 20.</span>
				Event Desc: <textarea id="description"></textarea> <br>
				<span class="errormsg" id="descErr">Description has too many characters. Max 300.</span>
				Start Date: <input type="date" id ="startDate"> <br>
				End Date: <input type="date" id ="endDate"> <br>
				Location: <input type="text" id="location"> <br>
				<span class="errormsg" id="locErr">Location has too many characters. Max 50.</span>
				<input type="submit" value="Create Event" id="createEvent" class="formButton"> <br>
				<div id="error"></div>
			</form>
			<a href="/SDP/model/logout.php">Logout</a>
		</div>

	</body>
</html>