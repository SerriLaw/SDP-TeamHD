
<html>
	<head>
		<title>BeanSprouts - Edit Event</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
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
			var startTime=$("#startTime").val();
			var endTime=$("#endTime").val();
			var location=$("#location").val();
			var managerID= $("#managerID").val();

			var dataString = 'name='+name+'&description='+description+"&startDate="+startDate+"&endDate="+endDate+"&startTime="+startTime+"&endTime="+endTime+"&location="+location+"&managerID="+managerID;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(description).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(startTime).length>0 && $.trim(endTime).length>0 && $.trim(location).length>0 && $.trim(managerID).length>0)
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


		<div id="wrap">
		<div class="heroname">Update Event</div>
		<div id="error"></div>
			<form action="" method="post">
				<table>
					<tr class="input">
						<td class="label">Event Manager</td>
						<td class="field">
							<select id="managerID">
								<?php 
									$sql12 = "SELECT * FROM user WHERE userType > 1 AND isActive = 1";
									$result12 = mysqli_query($db, $sql12);
									while($row12 = mysqli_fetch_array($result12))
									{
										echo "<option value=\"" . $row12['userID'] . "\">" .  $row12['userID']. " " . $row12['firstName'] . " " . $row12['lastName'] . "</option>";
									}

								?>
							</select>
						</td>
					</tr>
					<tr class="input">
						<td class="label">Event Name</td>
						<td class="field"><input type="text" id="name" class="textbox" value="<?php echo($row['name']); ?>"></td>
					</tr>
					<tr class="input">
						<td class="label">Description</td>
						<td class="field"><textarea id="description" class="textbox"><?php echo($row['description']); ?></textarea></td>
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
						<td class="label">Start Time</td>
						<td class="field"><input type="text" id ="startTime" value="<?php echo($row['startTime']); ?>"></td>
					</tr>
					<tr class="input">
						<td class="label">End Time</td>
						<td class="field"><input type="text" id ="endTime" value="<?php echo($row['endTime']); ?>"></td>
					</tr>


					<tr class="input">
						<td class="label">Location</td>
						<td class="field"><input type="text" id="location" class="textbox" value="<?php echo($row['location']); ?>"></td>
					</tr>
					
					<tr class="input">
						<td colspan="2"><input type="submit" value="Save Event" id="updateEvent"class="formButton"></td>
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