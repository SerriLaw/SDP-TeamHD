
<html>
	<head>
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>

		</script>
	</head>
	<body>
        <?php include('menu.php');?>
		<div id="wrap">
        <?php while($row = $q->fetch()){ if($row['isActive'] > 0){ ?>
		
        
	        <div class="event-block">
		        Event: <a href="viewEvent.php?id=<?php echo($row['eventID']); ?>"><?php echo($row['name']); ?></a> 
		        Start Date: <?php echo($row['startDate']); ?> - End Date: <?php echo($row['endDate']); ?>
	    	</div>
		

	        <?php } }?>

	    </div>
        
	</body>
</html>