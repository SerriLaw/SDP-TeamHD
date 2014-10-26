
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">

		</script>
	</head>
	<body>
        <?php include('menu.php');
        echo "<br><br>";
        while($row = $q->fetch()){ if($row['isActive'] > 0){ ?>
        <div>
        Event: <a href="viewEvent.php?id=<?php echo($row['eventID']); ?>"><?php echo($row['name']); ?></a> 
        Start Date: <?php echo($row['startDate']); ?> - End Date: <?php echo($row['endDate']); ?></div>
        <?php } }?>
	</body>
</html>