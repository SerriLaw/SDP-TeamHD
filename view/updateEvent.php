
<html>
	<head>
		<title>BeanSprouts - Edit Event</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#updateEvent').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var description=$("#description").val();
			var startDate=$("#startDate").val();
			var endDate=$("#endDate").val();
			var location=$("#location").val();

			var dataString = 'name='+name+'&description='+description+"&startDate="+startDate+"&endDate="+endDate+"&location="+location;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(description).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(location).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/updateEvent.php?id="+<?php echo($row['eventID']) ;?>,
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#updateEvent").val('Updating...');},
			success: function(data){
			if(data)
			{
				if(data.indexOf("SQLFAILURE") > -1){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
				}
				else if (data.indexOf("FAILURE") > -1) {
					$("#error").html("<span style='color:#cc0000'>Error:</span> LOLOLOLOL.");
				}else if(data == "SUCCESS"){
					console.log(data);
					window.location.href = "/SDP/viewEvent.php?id="+<?php echo($row['eventID']) ;?>;
				}
			
			}

			}
			});

			}
			else
			{
			$("#createEvent").val('Create Event');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<div id="wrap">
			<div class="heroname">Edit Event</div>
			<form action="" method="post">
				Event Name: <input type="text" id="name" value="<?php echo($row['name']); ?>"> <br>
				Event Desc: <textarea id="description"><?php echo($row['description']); ?></textarea> <br>
				Start Date: <input type="date" id ="startDate" value="<?php echo($row['startDate']); ?>"> <br>
				End Date: <input type="date" id ="endDate" value="<?php echo($row['endDate']); ?>"> <br>
				Location: <input type="text" id="location" value="<?php echo($row['location']); ?>"> <br>
				<div class="input"></div><input type="submit" value="Save Event" id="updateEvent"class="formButton"></div>
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