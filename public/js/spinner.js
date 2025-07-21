jQuery(function($){


//   $(document).ajaxSend(function() {
//     $("#overlay").fadeIn(300);　
//   });
		
  $(document).on('click', '.toursys-submit', function(){
  
	let isBlank = false;

	var currentForm = $(this).parents(".toursys-connect")

	$(currentForm).find(".toursys-datepicker").each(function(index){
		if($(this).val() == ""){
			isBlank = true;
			$(this).addClass("required-input");
		}
	});



  	if(isBlank == false){

		$(currentForm).find($(".overlay")).fadeIn(300);　

	    $.ajax({
	      type: 'GET',
	      success: function(data){
	        console.log(data);
	      }
	    }).done(function() {
	       
			setTimeout(function(){
				$(currentForm).find($(".overlay")).fadeOut(300);
			},2500);

			let productType = $(currentForm).find('.toursys-product-type').val();
			let toursysKey = $(currentForm).find('.toursys-key').val();
			let tsbeUrl = $(currentForm).find('form').attr('action');
			let params = {};

			if(productType == "TOUR"){

				let adults = $(currentForm).find('.toursys-tour-adults').val();
				let childs = $(currentForm).find('.toursys-tour-children').val();
				let productId = $(currentForm).find('.toursys-tour-product-id').val();
				let maxAdults = $(currentForm).find('.toursys-tour-max-adults').val();
				let maxChilds = $(currentForm).find('.toursys-tour-max-children').val();
				let tripDate = $(currentForm).find('.toursys-tour-trip-date').val();
				let openAgencyLogin = $(currentForm).find('.toursys-tour-agency-login-popup').val();

				params = {
					"productId" : productId,
					"adults" : adults,
					"children" : childs,
					"maxAdults" : maxAdults,
					"maxChildren" : maxChilds,
					"tripDate" : tripDate,
					"openAgencyLogin" : openAgencyLogin
				};

			}
			else if(productType == "TRANSFER"){

				let adults = $(currentForm).find('.toursys-transfer-adults').val();
				let childs = $(currentForm).find('.toursys-transfer-children').val();
				let productId = $(currentForm).find('.toursys-transfer-product-id').val();
				let maxAdults = $(currentForm).find('.toursys-transfer-max-adults').val();
				let maxChilds = $(currentForm).find('.toursys-transfer-max-children').val();
				let tripType = $(currentForm).find('.toursys-transfer-trip-type').val();
				let transferType = $(currentForm).find('.toursys-transfer-transfer-type').val();
				let openAgencyLogin = $(currentForm).find('.toursys-transfer-agency-login-popup').val();
				let arrivalDate = "";
				let departureDate = "";

				if(transferType == "ONE-WAY"){
					arrivalDate = $(currentForm).find('.toursys-transfer-arrival-date').val();

					params = {
						"productId" : productId,
						"adults" : adults,
						"children" : childs,
						"maxAdults" : maxAdults,
						"maxChildren" : maxChilds,
						"arrivalDate" : arrivalDate,
						"tripType" : tripType,
						"transferType" : transferType,
						"openAgencyLogin" : openAgencyLogin
					};
				}
				else {
					arrivalDate = $(currentForm).find('.toursys-transfer-arrival-date').val();
					departureDate = $(currentForm).find('.toursys-transfer-departure-date').val();

					params = {
						"productId" : productId,
						"adults" : adults,
						"children" : childs,
						"maxAdults" : maxAdults,
						"maxChildren" : maxChilds,
						"arrivalDate" : arrivalDate,
						"departureDate" : departureDate,
						"tripType" : tripType,
						"transferType" : transferType,
						"openAgencyLogin" : openAgencyLogin
					};
				}


			}
			else if(productType == "PACKAGE"){

				let adults = $(currentForm).find('.toursys-package-adults').val();
				let childs = $(currentForm).find('.toursys-package-children').val();
				let singleSupplement = $(currentForm).find('.toursys-package-single-supplements').val();
				let productId = $(currentForm).find('.toursys-package-product-id').val();
				let maxAdults = $(currentForm).find('.toursys-package-max-adults').val();
				let maxChilds = $(currentForm).find('.toursys-package-max-children').val();
				let tripDate = $(currentForm).find('.toursys-package-trip-date').val();
				let openAgencyLogin = $(currentForm).find('.toursys-package-agency-login-popup').val();

				params = {
					"productId" : productId,
					"adults" : adults,
					"single_supplement": singleSupplement,
					"children" : childs,
					"maxAdults" : maxAdults,
					"maxChildren" : maxChilds,
					"tripDate" : tripDate,
					"openAgencyLogin" : openAgencyLogin
				};

			}

			window.location.href = tsbeUrl + "?q=" + paramEncode(JSON.stringify(params)) + "&key=" + toursysKey;
			// $(currentForm).children("#toursys-form").submit();
			/*
			<input type="hidden" id="toursys-product-type" value="TOUR">
			<input type="hidden" id="toursys-tour-product-id" name="product-id" value="<?php print $productId; ?>" />
			<input type="hidden" id="toursys-tour-max-adults" name="max-adults" value="<?php print $maxAdults; ?>" />
			<input type="hidden" id="toursys-tour-max-children" name="max-children" value="<?php print $maxChildren; ?>" />
			<input type="hidden" name="key" value="<?php print get_option("toursys-api-token");?>">
			<select name="children" id="toursys-tour-children">
			<select name="adults" id="toursys-tour-adults">
			<input type="text" class="toursys-datepicker" name="trip-date" id="toursys-tour-trip-date" placeholder="Trip Date" readonly="true" required="required" />


			<input type="hidden" id="toursys-product-type" value="TRANSFER">
			<input type="hidden" id="toursys-transfer-product-id" name="product-id" value="<?php print $productId; ?>" />
			<input type="hidden" id="toursys-transfer-trip-type" name="trip-type" value="<?php print $tripType; ?>" /> //ROUND-TRIP, ONE-WAY
			<input type="hidden" id="toursys-transfer-transfer-type" name="transfer-type" value="<?php print $transferType; ?>" />
			<input type="hidden" id="toursys-transfer-max-adults" name="max-adults" value="<?php print $maxAdults; ?>" />
			<input type="hidden" id="toursys-transfer-max-children" name="max-children" value="<?php print $maxChildren; ?>" />
			<input type="hidden" name="key" value="<?php print get_option("toursys-api-token");?>">
			<select name="children" id="toursys-tour-children">
			<select name="adults" id="toursys-tour-adults">
			<input type="text" class="toursys-datepicker" name="arrival-date" placeholder="Pickup Date" readonly="true" required="required" />
			<input type="text" class="toursys-datepicker" name="departure-date" placeholder="Departure Date" readonly="true" required="required" />
			*/
	 

	    });

	
	}

  });

	function paramEncode(data){

		return randomString(1) + utf8_to_b64(data) + randomString(1);
	}

	function randomString(length) {

		let characters = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		let randomString = '';

		for (let i = 0; i < length; i++) {
			randomString += characters[Math.floor(Math.random() * characters.length)];
		}

		return randomString;
	}

	function utf8_to_b64( str ) {
		return window.btoa(unescape(encodeURIComponent( str )));
	}

	function b64_to_utf8( str ) {
		return decodeURIComponent(escape(window.atob( str )));
	}
});