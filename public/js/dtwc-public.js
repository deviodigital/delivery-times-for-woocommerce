jQuery(document).ready(function( $ ) {
	var deliveryDays = dtwc_settings.deliveryDays;
	var weekDays = [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];

	$('#dtwc_delivery_date').datepicker( {
		minDate: 0,
		maxDate: dtwc_settings.maxDays,
		showAnim: 'fadeIn',
		dateFormat: 'yy-mm-dd',
		firstDay: 0,
		beforeShowDay: function(date) {
			var currentWeekday = weekDays[ date.getDay() ];
			if ( currentWeekday in deliveryDays ) {
				// So enable the date here by returning an array
				return [ true, "custom_css_class", "This date is available"];
			}
			return [ false, "unavailable_css_class", "This date is unavailable" ];
		}
	} );
} );
