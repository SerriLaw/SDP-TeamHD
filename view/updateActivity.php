
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#updateActivity').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var description=$("#description").val();
			var location=$("#location").val();
			var startDate=$("#startDate").val();
			var endDate=$("#endDate").val();
			var startTime=$("#startTime").val();
			var endTime=$("#endTime").val();

			var managerid =<?php echo($_SESSION['userID'])?>; 

			var dataString = 'name='+name+'&description='+description+"&location="+location+"&startDate="+startDate+"&endDate="+endDate+"&startTime="+startTime+"&endTime="+endTime;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(description).length>0 && $.trim(location).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(startTime).length>0 && $.trim(endTime).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/updateActivity.php?activityid=<?php echo($row['activityID']); ?>",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#updateActivity").val('Updating...');},
			success: function(data){
			if(data)
			{
				if(data.indexOf("SQLFAILURE") > -1){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
					console.log(data);
				}
				else if (data.indexOf("FAILURE") > -1) {
					$("#error").html("<span style='color:#cc0000'>Error:</span> LOLOLOLOL.");
				}else if (data.indexOf("SUCCESS") > -1){
					console.log(data);
					window.location.href = "/SDP/viewActivity.php?activityid=<?php echo($row['activityID']); ?>"+"&managerid="+managerid;
				}
			
			}
			}
			});

			}
			else
			{
			$("#updateActivity").val('Update Activity');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Update an Activity</h1>
		<form action="" method="post">
			Activity Name: <input type="text" id="name" value="<?php echo($row['name']); ?>"> <br>
			Activity Desc: <textarea id="description"><?php echo($row['description']); ?></textarea> <br>
			Location: <input type="text" id="location" value="<?php echo($row['location']); ?>"> <br>
			Start Date: <input type="date" id ="startDate" value="<?php echo($row['startDate']); ?>"> <br>
			End Date: <input type="date" id ="endDate" value="<?php echo($row['endDate']); ?>"> <br>
			Start Time: <input type="text" id="startTime" value="<?php echo($row['startTime']); ?>"> (Format 0000) <br>
			End Time: <input type="text" id="endTime" value="<?php echo($row['endTime']); ?>"> (Format 0000)<br>
			
			<input type="submit" value="Update Activity" id="updateActivity"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>