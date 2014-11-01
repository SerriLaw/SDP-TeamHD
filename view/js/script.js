$(document).ready(function() {
    prettyDates();
    prettyTimes();
});




function dateFormat(param) {

	var htmlDate = $(param).html().split("-");
    var month = (htmlDate[1] - 1);
    var date = new Date(htmlDate[0], month, htmlDate[2]);
    date = date.toDateString();

    date = date.split(" ");
    var string = date[0] + " " + date[2] + " " + date[1] + ", " + date[3];

    $(param).html(string);
    
}

function timeFormat(param) {
	text = $(param).html()

	var string = text.charAt(0) + text.charAt(1) + ":" + text.charAt(2) + text.charAt(3); 

	$(param).html(string);
}


function loopForDates(param) {
	for (var i = 0; i < param.length; i++) {
		dateFormat(param[i]);
	};
}

function loopForTimes(param) {
	for (var i = 0; i < param.length; i++) {
		timeFormat(param[i]);
	};
}

function prettyDates() {

	var className = $(".dateToForm");
	loopForDates(className);
}

function prettyTimes() {
	var className = $(".timeToForm");
	loopForTimes(className);
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