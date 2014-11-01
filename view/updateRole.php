
<html>
	<head>
		<title>BeanSprouts - Edit Role</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
			var activityID=<?php echo($row['activityID'])?>;
			var startDate=$("#startDate").val();
			var endDate=$("#endDate").val();
			var startTime=$("#startTime").val();
			var endTime=$("#endTime").val();

			var managerid=<?php echo($_SESSION['userID']); ?>;

			var dataString = 'name='+name+'&isPaid='+isPaid+'&description='+description+"&requirements="+requirements+"&activityID="+activityID+"&startDate="+startDate+"&endDate="+endDate+"&startTime="+startTime+"&endTime="+endTime;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(isPaid).length>0 && $.trim(description).length>0 && $.trim(requirements).length>0 && $.trim(activityID).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(startTime).length>0 && $.trim(endTime).length>0)
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
		<div id="wrap">
		<div class="heroname">Edit Role</div>
			<form action="" method="post">
				Role Name: <input type="text" id="name" value="<?php echo($row['name']); ?>"> <br>
				Paid: <br>
				<input type="radio" name="isPaid" value="1" <?php if($row['isPaid'] == 1){echo('checked="checked"');} ?> > Yes: <br>
				<input type="radio" name="isPaid" value="0" <?php if($row['isPaid'] == 0){echo('checked="checked"');} ?>> No: <br>
				Role Desc: <textarea id="description"><?php echo($row['description']); ?></textarea> <br>
				Requirements: <textarea id="requirements"><?php echo($row['requirements']); ?></textarea> <br>
				Start Date: <input type="date" id ="startDate" value="<?php echo($row['startDate']); ?>"> <br>
				End Date: <input type="date" id ="endDate" value="<?php echo($row['endDate']); ?>"> <br>
				Start Time: <input type="text" id="startTime" value="<?php echo($row['startTime']); ?>"> (Format 0000) <br>
				End Time: <input type="text" id="endTime" value="<?php echo($row['endTime']); ?>"> (Format 0000)<br>
				
				<div class="input"><input type="submit" value="Save Role" id="updateRole"class="formButton"></div>
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