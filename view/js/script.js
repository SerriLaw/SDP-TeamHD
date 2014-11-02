$(document).ready(function() {
    prettyDates();
    prettyTimes();
    kickerBiggerThanMax();
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


// VALIDATION

function biggerThanMax(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var max = $(item).attr("max-val");

			if ($(item).val().length > max) {
				
				$("#error").html("Error: " + $(item).attr("friendly") + " is too long. Max " + max + " characters.");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

			} else {

				$(item).css("box-shadow","none");
				$(".subBtn").prop("disabled", false);

				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");

				}
			}
		}

	});
}


function kickerBiggerThanMax() {
	var className = $(".hasMax");
	biggerThanMax(className);
}
