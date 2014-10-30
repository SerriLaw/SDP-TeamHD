
<html>
	<head>
		<title>BeanSprouts - Create Role</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
		<div id="wrap">
		
			<form action="" method="post">
				Role Name: <input type="text" id="name"> <br>
				Paid: <br>
				<input type="radio" name="isPaid" value="1"> Yes <br>
				<input type="radio" name="isPaid" value="0"> No <br>
				Rate/Hour: <input type="text" id ="rate"> (If "No" then leave blank) <br>
				Role Desc: <textarea id="description"></textarea> <br>
				Requirements: <textarea id="requirements"></textarea> <br>
				Date: <input type="date" id ="date"> <br>
				Start Time: <input type="text" id="startTime"> (Format 0000) <br>
				End Time: <input type="text" id="endTime"> (Format 0000)<br>
				
				<div class="input"><input type="submit" value="Create Role" id="createRole" class="formButton"></div>
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