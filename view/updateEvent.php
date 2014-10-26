
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
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
		<h1>Update an Event</h1>
		<form action="" method="post">
			Event Name: <input type="text" id="name" value="<?php echo($row['name']); ?>"> <br>
			Event Desc: <textarea id="description"><?php echo($row['description']); ?></textarea> <br>
			Start Date: <input type="date" id ="startDate" value="<?php echo($row['startDate']); ?>"> <br>
			End Date: <input type="date" id ="endDate" value="<?php echo($row['endDate']); ?>"> <br>
			Location: <input type="text" id="location" value="<?php echo($row['location']); ?>"> <br>
			<input type="submit" value="Update Event" id="updateEvent"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>