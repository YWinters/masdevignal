function loadCalendar(date) {
    console.log(date);
	var cur_month = new Date($('#start_month').val());
    console.log("start_month = " + cur_month);
	var calc_month = cur_month;
	if (date == -1){
		calc_month.setMonth(calc_month.getMonth() - 1);
	} else {
		calc_month.setMonth(calc_month.getMonth() + 1);
	}
    console.log("after calculations = " + calc_month);
    console.log(calc_month.toLocaleDateString("en-US"));
   
    $.ajax({
        url : 'php/calendar.php',
        data:{start_month: calc_month.toLocaleDateString("en-US")},
        type: 'GET',
        success: function(data){
            $('#calendar').html(data);
        }
    });
               // The function returns the product of p1 and p2
}

function loadCalendar2(date) {
    console.log(date);
    var cur_month = new Date($('#start_month2').val());
    console.log("start_month = " + cur_month);
    var calc_month = cur_month;
    if (date == -1){
        calc_month.setMonth(calc_month.getMonth() - 1);
    } else {
        calc_month.setMonth(calc_month.getMonth() + 1);
    }
    console.log("after calculations = " + calc_month.toLocaleDateString("en-US"));

    $.ajax({
        url : 'php/calendar2.php',
        data:{start_month2: calc_month.toLocaleDateString("en-US")},
        type: 'GET',
        success: function(data){
            $('#calendar2').html(data);
        }
    });
    // The function returns the product of p1 and p2
}


function loadCalendar3(date) {
    console.log(date);
    var cur_month = new Date($('#start_month3').val());
    console.log("start_month = " + cur_month);
    var calc_month = cur_month;
    if (date == -1){
        calc_month.setMonth(calc_month.getMonth() - 1);
    } else {
        calc_month.setMonth(calc_month.getMonth() + 1);
    }
    console.log("after calculations = " + calc_month.toLocaleDateString("en-US"));

    $.ajax({
        url : 'php/calendar3.php',
        data:{start_month3: calc_month.toLocaleDateString("en-US")},
        type: 'GET',
        success: function(data){
            $('#calendar3').html(data);
        }
    });
    // The function returns the product of p1 and p2
}