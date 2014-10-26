
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#createActivity').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var description=$("#description").val();
			var location=$("#location").val();
			var startDate=$("#startDate").val();
			var endDate=$("#endDate").val();
			var startTime=$("#startTime").val();
			var endTime=$("#endTime").val();
			var eventID= <?php echo($_GET['eventid'])?>;

			var managerid =<?php echo($_SESSION['userID'])?>; 

			var dataString = 'name='+name+'&description='+description+"&location="+location+"&startDate="+startDate+"&endDate="+endDate+"&startTime="+startTime+"&endTime="+endTime+"&eventID="+eventID;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(description).length>0 && $.trim(location).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(startTime).length>0 && $.trim(endTime).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/createActivity.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#createActivity").val('Creating...');},
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
					window.location.href = "/SDP/viewActivity.php?activityid="+data+"&managerid="+managerid;
				}
			
			}
			}
			});

			}
			else
			{
			$("#createActivity").val('Create Activity');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Create an Activity</h1>
		<form action="" method="post">
			Activity Name: <input type="text" id="name"> <br>
			Activity Desc: <textarea id="description"></textarea> <br>
			Location: <input type="text" id="location"> <br>
			Start Date: <input type="date" id ="startDate"> <br>
			End Date: <input type="date" id ="endDate"> <br>
			Start Time: <input type="text" id="startTime"> (Format 0000) <br>
			End Time: <input type="text" id="endTime"> (Format 0000)<br>
			
			<input type="submit" value="Create Activity" id="createActivity"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>