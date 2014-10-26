
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{

			$('#createEvent').click(function(event)
			{
			event.preventDefault();
			var name=$("#name").val();
			var description=$("#description").val();
			var startDate=$("#startDate").val();
			var endDate=$("#endDate").val();
			var location=$("#location").val();
			var managerID= <?php echo $_SESSION['userID'] ?>;

			var dataString = 'name='+name+'&description='+description+"&startDate="+startDate+"&endDate="+endDate+"&location="+location+"&managerID="+managerID;
			console.log(dataString);
			if($.trim(name).length>0 && $.trim(description).length>0 && $.trim(startDate).length>0 && $.trim(endDate).length>0 && $.trim(location).length>0)
			{
			console.log("fire");
			$.ajax({
			type: "POST",
			url: "/SDP/model/createEvent.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#createEvent").val('Creating...');},
			success: function(data){
			if(data)
			{
				if(data == "SQLFAILURE"){
					$("#error").html("<span style='color:#cc0000'>Error:</span> Internal Error. ");
				}
				else if (data == "FAILURE") {
					$("#error").html("<span style='color:#cc0000'>Error:</span> LOLOLOLOL.");
				}else{
					console.log(data);
					window.location.href = "/SDP/viewEvent.php?id="+data;
				}
			
			}
			else
			{
			$("#createEvent").val('Create Event');
			$("#error").html("<span style='color:#cc0000'>Error:</span> Please fill in the above form.");
			}
			}
			});

			}
			return false;
			});

			});						
		</script>
	<head>
	<body>
        <?php include("menu.php"); ?>
		<h1>Create an Event</h1>
		<form action="" method="post">
			Event Name: <input type="text" id="name"> <br>
			Event Desc: <textarea id="description"></textarea> <br>
			Start Date: <input type="date" id ="startDate"> <br>
			End Date: <input type="date" id ="endDate"> <br>
			Location: <input type="text" id="location"> <br>
			<input type="submit" value="Create Event" id="createEvent"> <br>
			<div id="error"></div>
		</form>
	</body>
</html>