
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#createRole').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var isPaid=$('input:radio[name=isPaid]:checked').val();
			var description=$("#description").val();
			var requirements=$("#requirements").val();
			var rate=$("#rate").val();
			var activityID=<?php echo($_GET['activityid'])?>;
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
			url: "/SDP/model/createRole.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#createRole").val('Creating...');},
			success: function(data){
			if(data)
			{
				if(data.indexOf("SQLFAILURE") > -1){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
					console.log(data);
				}
				else if (data.indexOf("FAILURE") > -1) {
					$("#error").html("<span style='color:#cc0000'>Error:</span> LOLOLOLOL.");
				}else{
					console.log(data);
					window.location.href = "/SDP/viewRole.php?roleid="+data+"&managerid="+managerid;
				}
			
			}
			}
			});

			}
			else
			{
			$("#createRole").val('Create Role');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Create a Role</h1>
		<form action="" method="post">
			Role Name: <input type="text" id="name"> <br>
			Paid: <br>
			<input type="radio" name="isPaid" value="1"> Yes: <br>
			<input type="radio" name="isPaid" value="0"> No: <br>
			Rate/Hour: <input type="text" id ="rate"> (If "No" then leave blank) <br>
			Role Desc: <textarea id="description"></textarea> <br>
			Requirements: <textarea id="requirements"></textarea> <br>
			Date: <input type="date" id ="date"> <br>
			Start Time: <input type="text" id="startTime"> (Format 0000) <br>
			End Time: <input type="text" id="endTime"> (Format 0000)<br>
			
			<input type="submit" value="Create Role" id="createRole"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>