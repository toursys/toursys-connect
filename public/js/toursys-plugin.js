(function($) {

	$(document).ready(function(){

		$(".toursys-datepicker").datepicker({
			minDate: 0,
			dateFormat: 'dd/mm/yy',
			onSelect: function(){
				$(".toursys-transfer-trip-date").removeClass("required-input");
			}
		});

	});




}(jQuery));

