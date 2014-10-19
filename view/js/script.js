$(document).ready(function() {
    dateFormat("#date1");
    dateFormat("#date2");
});



function dateFormat(param) {
	var htmlDate = $(param).html().split("-")
    var month = (htmlDate[1] - 1);
    var date = new Date(htmlDate[0], month, htmlDate[2]);
    date = date.toDateString()

    date = date.split(" ");
    var string = date[0] + " " + date[2] + " " + date[1] + ", " + date[3];

    $(param).html(string);
    
}