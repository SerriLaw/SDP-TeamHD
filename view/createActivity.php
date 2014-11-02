<?php include('../SDP/model/eventDate.php');?>
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
			<div id="error"></div>

			<form action="" method="post">

				<table>
					<tr class="input">
						<td class="label">Activity Name</td>
						<td class="field"><input type="text" id="name" class="textbox hasMax" placeholder="e.g. FEIT Stall" friendly="Activity Name" max-val="20"></td>
					</tr>
					<tr class="input">
						<td class="label">Description</td>
						<td class="field"><textarea id="description" class="textbox hasMax" placeholder="e.g. This is a fun activity!" friendly="Description" max-val="300"></textarea></td>
					</tr>
					<tr class="input">
						<td class="label">Start Date</td>
						<td class="field"><input type="date" id ="startDate"></td>
					</tr>
					<tr class="input">
						<td class="label">End Date</td>
						<td class="field"><input type="date" id ="endDate"></td>
					</tr>


					<tr class="input">
						<td class="label">Location</td>
						<td class="field"><input type="text" id="location" class="textbox hasMax" placeholder="e.g. CB 11.4.400" friendly="Location" max-val="50"></td>
					</tr>
					<tr class="input">
						<td class="label">Start Time</td>
						<td class="field"><input type="text" class="textbox hasMax fourDigit" id="startTime" friendly="Start Time" max-val="4"> (Format 0000)</td>
					</tr>
					<tr class="input">
						<td class="label">End Time</td>
						<td class="field"><input type="text" class="textbox hasMax fourDigit" id="endTime" friendly="End Time" max-val="4"> (Format 0000)</td>
					</tr>
					<tr class="input">
						<td colspan="2"><input type="submit" value="Create Activity" id="createActivity" class="formButton subBtn"></td>
					</tr>
					
					
				</table>
	
				
			</form>
			<div class="footer">
		    	<img src="view/img/image-green.png" alt="BeanSprouts Footer">
		    	<br>
		    	<i class="fa fa-copyright"></i> BeanSprouts 2014
		    </div>
		</div>
	</body>
</html>