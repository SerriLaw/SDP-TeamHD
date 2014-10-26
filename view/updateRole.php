
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#updateRole').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var isPaid=$('input:radio[name=isPaid]:checked').val();
			var description=$("#description").val();
			var requirements=$("#requirements").val();
			var rate=$("#rate").val();
			var activityID=<?php echo($row['activityID'])?>;
			var date=$("#date").val();
			var startTime=$("#startTime").val();
			var endTime=$("#endTime").val();

			var managerid=<?php echo($_SESSION['userID']); ?>;

			var dataString = 'name='+name+'&isPaid='+isPaid+'&description='+description+"&requirements="+requirements+"&rate="+rate+"&activityID="+activityID+"&date="+date+"&startTime="+startTime+"&endTime="+endTime;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(isPaid).length>0 && $.trim(description).length>0 && $.trim(requirements).length>0 && $.trim(activityID).length>0 && $.trim(date).length>0 && $.trim(startTime).length>0 && $.trim(endTime).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/updateRole.php?roleid=<?php echo($row['roleID']); ?>",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#updateRole").val('Updating...');},
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
					window.location.href = "/SDP/viewRole.php?roleid=<?php echo($row['roleID']); ?>"+"&managerid="+managerid;
				}
			
			}
			}
			});

			}
			else
			{
			$("#updateRole").val('Update Role');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Update a Role</h1>
		<form action="" method="post">
			Role Name: <input type="text" id="name" value="<?php echo($row['name']); ?>"> <br>
			Paid: <br>
			<input type="radio" name="isPaid" value="1" <?php if($row['isPaid'] == 1){echo('checked="checked"');} ?> > Yes: <br>
			<input type="radio" name="isPaid" value="0" <?php if($row['isPaid'] == 0){echo('checked="checked"');} ?>> No: <br>
			Rate/Hour: <input type="text" id ="rate" value="<?php echo($row['rate']); ?>"><br>
			Role Desc: <textarea id="description"><?php echo($row['description']); ?></textarea> <br>
			Requirements: <textarea id="requirements"><?php echo($row['requirements']); ?></textarea> <br>
			Date: <input type="date" id ="date" value="<?php echo($row1['date']); ?>"> <br>
			Start Time: <input type="text" id="startTime" value="<?php echo($row1['startTime']); ?>"> (Format 0000) <br>
			End Time: <input type="text" id="endTime" value="<?php echo($row1['endTime']); ?>"> (Format 0000)<br>
			
			<input type="submit" value="Update Role" id="updateRole"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>