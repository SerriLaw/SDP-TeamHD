$(document).ready(function() {
    prettyDates();
    prettyTimes();

    kickerBiggerThanMax();
    kickerNumOnly();
    kickerFourDigit();
    kickerEmailSign();
    kickerLetterHyphenApostropheOnly();
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
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);


				}
			}
		}

	});
}


function kickerBiggerThanMax() {
	var className = $(".hasMax");
	biggerThanMax(className);
}

function phoneNumbers(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var pattern = new RegExp("^([0-9]|\\+|,|\\s)+$");

			if (pattern.test($(item).val()) || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " can only contain numbers between 0 - 9, +, spaces and , .");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function kickerNumOnly() {
	var className = $(".numOnly");
	phoneNumbers(className);
}

function fourDigit(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var pattern = new RegExp("[0-9][0-9][0-9][0-9]");

			if (pattern.test($(item).val()) || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " can only contain numbers between 0 - 9 in the format 0000, 24 hour time.");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function kickerFourDigit() {
	var className = $(".fourDigit");
	fourDigit(className);
}

function emailSign(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var pattern = new RegExp("^([A-z]|[0-9]|-|\\.)+@+([A-z]|[0-9]|-|)+\\.([A-z]|[0-9]|-|\\.)+$");

			if (pattern.test($(item).val()) || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " contains invalid email address.");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function kickerEmailSign() {
	var className = $(".emailSign");
	emailSign(className);
}

function letterHyphenApostropheOnly(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var pattern = new RegExp("^([A-z]|'|-)+$");

			if (pattern.test($(item).val()) || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " contains invalid characters. Upper/lower case letters, hyphens, apostrophe only.");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function kickerLetterHyphenApostropheOnly() {
	var className = $(".lha");
	letterHyphenApostropheOnly(className);
}

