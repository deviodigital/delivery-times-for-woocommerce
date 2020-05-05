jQuery(document).ready(function( $ ) {
	var deliveryDays = dtwc_settings.deliveryDays;
	var weekDays = [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];

	$('#dtwc_delivery_date').datepicker( {
		minDate: dtwc_settings.minDate,
		maxDate: dtwc_settings.maxDays,
		showAnim: 'fadeIn',
		dateFormat: 'yy-mm-dd',
		firstDay: dtwc_settings.firstDay,
		beforeShowDay: function(date) {
			var currentWeekday = weekDays[ date.getDay() ];
			if ( currentWeekday in deliveryDays ) {
				// So enable the date here by returning an array.
				return [ true, "dtwc_date_available", "This date is available"];
			}
			return [ false, "dtwc_date_unavailable", "This date is unavailable" ];
		}
	} );
} );

jQuery(document).ready(function( $ ) {
	$('#dtwc_delivery_date').change(function() {
		var date = $(this).val();
		var varDate = new Date(date);
		var today = new Date();

		today.setHours(0,0,0,0);

		// Delivery date is AFTER today.
		if (varDate<=today) {

			var x = 30; //minutes interval
			var times = []; // time array
			var tt = 0; // start time

			// Create times array.
			for (var i=0;tt<24*60; i++) {
				var hh = Math.floor(tt/60);
				var mm = (tt%60);
				// Time added to array.
				times[i] = ('0' + (hh % 12)).slice(-2) + ':' + ('0' + mm).slice(-2);
				// Add 30 minutes to time.
				tt = tt + x;
			}

			var deliveryTimes = dtwc_settings.deliveryTimes;

			var result = [];

			for(var t in deliveryTimes){
				result.push(deliveryTimes[t]);
			}

			// Loop through times.
			result.forEach(myFunction);

			function myFunction(item) {

				if (item<=dtwc_settings.prepTime) {
					// Remove specific time from available options.
					$("#dtwc_delivery_time option[value='" + item + "']").remove();
				}
			}

		}
	});
});
