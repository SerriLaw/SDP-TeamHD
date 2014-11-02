<?php include('../SDP/model/eventDate.php');?>
<html>
	<head>
		<title>BeanSprouts - Edit Activity</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
		
        <div id="wrap">
			<div class="heroname">Edit Activity</div>
			<div id="error"></div>

			<form action="" method="post">

				<table>
					<tr class="input">
						<td class="label">Activity Name</td>
						<td class="field"><input type="text" id="name" class="textbox hasMax" value="<?php echo($row['name']); ?>" friendly="Activity Name" max-val="20"></td>
					</tr>
					<tr class="input">
						<td class="label">Description</td>
						<td class="field"><textarea id="description" class="textbox hasMax" friendly="Description" max-val="300"><?php echo($row['description']); ?></textarea></td>
					</tr>
					<tr class="input">
						<td class="label">Start Date</td>
						<td class="field"><input type="date" id ="startDate" value="<?php echo($row['startDate']); ?>"></td>
					</tr>
					<tr class="input">
						<td class="label">End Date</td>
						<td class="field"><input type="date" id ="endDate" value="<?php echo($row['endDate']); ?>"></td>
					</tr>


					<tr class="input">
						<td class="label">Location</td>
						<td class="field"><input type="text" id="location" class="textbox hasMax" value="<?php echo($row['location']); ?>" friendly="Location" max-val="50"></td>
					</tr>
					<tr class="input">
						<td class="label">Start Time</td>
						<td class="field"><input type="text" class="textbox hasMax fourDigit" id="startTime" value="<?php echo($row['startTime']); ?>" friendly="Start Time" max-val="4"> (Format 0000)</td>
					</tr>
					<tr class="input">
						<td class="label">End Time</td>
						<td class="field"><input type="text" class="textbox hasMax fourDigit" id="endTime" value="<?php echo($row['endTime']); ?>" friendly="End Time" max-val="4"> (Format 0000)</td>
					</tr>
					<tr class="input">
						<td colspan="2"><div class="input"><input type="submit" value="Save Activity" id="updateActivity" class="formButton subBtn"></div> </td>
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