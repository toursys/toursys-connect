(function($) {

	$(document).ready(function(){

		$(".toursys-datepicker").datepicker({
			minDate: 0,
			dateFormat: 'dd/mm/yy',
			onSelect: function(){
				$("#toursys-transfer-trip-date").removeClass("required-input");
			}
		});


	});

	$(document).on("blur", ".toursys-datepicker", function(){

		if($(this).val() == ""){
			$(this).addClass("required-input");
		}
		else{
			$(this).removeClass("required-input");
		}

	});

	$(document).on("click", "#toursys-submit", function(){

		if($(".required-input").length == 0){
			//$("#toursys-form").submit();
		}

	});

}(jQuery));
