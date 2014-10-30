
<html>
	<head>
		<title>BeanSprouts - Create Activity</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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

        <div id="wrap">
			<div class="heroname">Add New Activity</div>
			<form action="" method="post">
				<div class="input">Activity Name <input type="text" id="name" class="textbox" placeholder="e.g. FEIT Stall"></div>
				<div class="input">Activity Description <textarea id="description" class="textbox" placeholder="e.g. This is a fun activity!"></textarea></div>
				<div class="input">Activity Start Date <input type="date" id ="startDate"></div>
				<div class="input">Activity End Date <input type="date" id ="endDate"></div>
				
				<div class="input">Activity Location <input type="text" id="location" class="textbox" placeholder="e.g. CB 11.4.400"></div>
				<div class="input">Activity Start Time<input type="text" class="textbox" id="startTime"> (Format 0000)</div>
				<div class="input">Activity End Time<input type="text" class="textbox" id="endTime"> (Format 0000)</div>

				
				
				
				<div class="input"><input type="submit" value="Create Activity" id="createActivity" class="formButton"></div>
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