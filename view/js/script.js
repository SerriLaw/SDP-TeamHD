function dateFormat(param) {
	var htmlDate = $(param).html().split("-");
    var month = (htmlDate[1] - 1);
    var date = new Date(htmlDate[0], month, htmlDate[2]);
    date = date.toDateString();

    date = date.split(" ");
    var string = date[0] + " " + date[2] + " " + date[1] + ", " + date[3];

    $(param).html(string);
    
}


function validateChar() {
	$('#descErr').hide();
	$('#nameErr').hide();
	$('#locErr').hide();


	$('#description').keyup(function() {
	    var count = $(this).val().length;
		if (count > 300) {
			$('#descErr').show();
		} else {
			$('#descErr').hide();
		}
	});

	$('#name').keyup(function() {
	    var count = $(this).val().length;
		if (count > 20) {
			$('#nameErr').show();
		} else {
			$('#nameErr').hide();
		}
	});

	$('#location').keyup(function() {
	    var count = $(this).val().length;
		if (count > 50) {
			$('#locErr').show();
		} else {
			$('#locErr').hide();
		}
	});
}