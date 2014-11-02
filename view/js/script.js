$(document).ready(function() {
    prettyDates();
    prettyTimes();

    kickerBiggerThanMax();
    kickerNumOnly();
    kickerFourDigit();
    kickerEmailSign();
    kickerLetterHyphenApostropheOnly();
    kickerDateRegression();
    kickerEarlierThanToday();
    kickerLaterThanToday();
    kickerSamePageStartBeforeEnd();
});




function dateFormat(param) {

	var htmlDate = $(param).html().split("-");
    var month = (htmlDate[1] - 1);
    var date = new Date(htmlDate[0], month, htmlDate[2]);
    $(param).attr("saveDate", date);
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

function dateRegression(array) {
	
	$(array).keyup(function (){
		var err = 0;
		
		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var pattern = new RegExp("^[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$");

			if (pattern.test($(item).val()) || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " contains invalid date. Must be in format YYYY-MM-DD. ");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function kickerDateRegression() {
	var className = $(".dateReg");
	dateRegression(className);
}




function dateEarlierThanToday(array) {
	

	$(array).change(function (){
		
		var err = 0;
		var today = new Date();

		

		for (var i = 0; i < array.length; i++) {
			var item = array[i];

			

			var itemDate = formatToDate($(item).val());

			

			if ((itemDate) > today || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " contains invalid date. Date is earlier than today. ");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}

function dateLaterThanToday(array) {
	

	$(array).change(function (){
		
		var err = 0;
		var today = new Date();

		

		for (var i = 0; i < array.length; i++) {
			var item = array[i];

			

			var itemDate = formatToDate($(item).val());

			

			if ((itemDate) < today || $(item).val() === "") {
				
				$(item).css("box-shadow","none");
				
				if (err === 0) {
					$("#error").html("");
					$(item).css("box-shadow","none");
					$(".subBtn").prop("disabled", false);

				}

			} else {

				$("#error").html("Error: " + $(item).attr("friendly") + " contains invalid date. You can't be born in the future! ");
				$(item).css("box-shadow","0 0 5px red");
				err = 1;
				$(".subBtn").prop("disabled", true);

				
			}
		}

	});
}


function formatToDate(numbers) {
	
	var htmlDate = numbers.split("-");
    var month = (htmlDate[1] - 1);
    var date = new Date(htmlDate[0], month, htmlDate[2]);

    return date;
}

function kickerEarlierThanToday() {
	var className = $(".notEarlierThanToday");
	dateEarlierThanToday(className);
}

function kickerLaterThanToday() {
	var className = $(".notLaterThanToday");
	dateLaterThanToday(className);
}

function kickerSamePageStartBeforeEnd() {
	var className = $(".dateReg");
	samePageStartBeforeEnd(className);
}

function samePageStartBeforeEnd (array) {
	$(array).change(function (){
		var err = 0;
		var start = formatToDate($("#startDate").val());
		var end = formatToDate($("#endDate").val());

		if (start > end) {
			$("#error").html("Error: End date can NOT be before start date. ");
			$("#startDate").css("box-shadow","0 0 5px red");
			$("#endDate").css("box-shadow","0 0 5px red");
			err = 1;
			$(".subBtn").prop("disabled", true);
		} else {
			$("#startDate").css("box-shadow","none");
			$("#endDate").css("box-shadow","none");
			
			if (err === 0) {
				$("#error").html("");
				$("#startDate").css("box-shadow","none");
				$("#endDate").css("box-shadow","none");
				$(".subBtn").prop("disabled", false);

			}
		}

	});
}
