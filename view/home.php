
<html>
	<head>
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
	</head>
	<body>
        <?php include('menu.php');?>
		<div id="wrap">

			<div id="hero"><img src="view/img/icon.png" alt="BeanSprouts" id="bigbean"><span id="bigbeantext">BeanSprouts</span></div>

			<div class="event-block-stream">
			<?php while($row = $q->fetch()){ if($row['isActive'] > 0){ ?>
		        <div class="event-block">
    		        <a href="viewEvent.php?id=<?php echo($row['eventID']); ?>">
    		        <div class="event-block-name"><?php echo($row['name']); ?></div> 
    		        <div class="event-block-date"><i class="fa fa-calendar"></i> Starts <span class="dateToForm"><?php echo($row['startDate']); ?></span> until <?php echo($row['endDate']); ?></div>
    		        <div class="event-block-desc"><?php echo($row['description']); ?></div>
    		        
    		        </a>
        	    </div>
        	<?php } }?>

		    </div>

		    <div class="footer">
		    	<img src="view/img/image-green.png" alt="BeanSprouts Footer">
		    	<br>
		    	<i class="fa fa-copyright"></i> BeanSprouts 2014
		    </div>
	    </div>               
	</body>

</html>