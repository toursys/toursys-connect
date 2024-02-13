<?php
$tsbeUrl = (strpos(get_option("home"), DEV_WEBSITE) !== false ? TOURSYS_BOOKING_ENGINE_URL_DEV : TOURSYS_BOOKING_ENGINE_URL);

$openAgencyLogin = ($openAgencyLogin == "true") ?  1 : 0;

?>
<div id="toursys" class="toursys-connect">

<form id="toursys-form" class="toursys-form" action="<?php print esc_url($tsbeUrl . "transfers/booking.php"); ?>"  method="get" style="display:block; position:relative; width:100%;  max-width:500px !important; border:0px; background-color:none; padding:0px; margin-bottom:20px;">

	<div id="overlay" class="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
      <div>
      <div class="text-center" style="font-size:18px; color:#ffffff; padding:10px;">Just a moment. You are now being directed to our booking service.</div>
      </div>

    </div>

	<div class="toursys-form" style="border-color:<?php print esc_attr($foreColor); ?> !important; color: <?php print esc_attr($foreColor); ?> !important;" >

		<div class="wrap">
			<h4 style="color: <?php print esc_attr($textColor); ?> !important;"><?php print esc_attr($headerText); ?></h4>
		</div>
  
		<?php if($attributes['trip-type'] == "ROUND-TRIP"){ ?>

		<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">Arrival Date: </label>
    			<input type="text" class="toursys-datepicker toursys-transfer-arrival-date" name="arrival-date" placeholder="Arrival Date" readonly="true" required="required"  />
    		</div>
    	</div>

		<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">Departure Date: </label>
    			<input type="text" class="toursys-datepicker toursys-transfer-departure-date" name="departure-date" placeholder="Departure Date" readonly="true" required="required" />
    		</div>
    	</div>

		<?php } else { ?>

		<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">Pickup Date: </label>
    			<input type="text" class="toursys-datepicker toursys-transfer-arrival-date" name="arrival-date" placeholder="Pickup Date" readonly="true" required="required" />
    		</div>
    	</div>
		
		<?php } ?>

    	<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">No. of Adults: </label>

        			<select name="adults" id="toursys-transfer-adults" class="toursys-transfer-adults">
        				<?php
            				for($i = 1; $i <= $maxAdults; $i++){
				                if($i == $defaultAdults) {
					                print "<option value='" . $i . "' selected>" . $i . "</option>\n";
				                }
                                else{
	                                print "<option value='" . $i . "'>" . $i . "</option>\n";
                                }
            				}
        				?>
        			</select>

    		</div>
    	</div>
    	<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print $textColor; ?> !important;">No. of Children: </label>

        			<select name="children" id="toursys-transfer-children" class="toursys-transfer-children">
        				<?php
            				for($i = 0; $i <= $maxChildren; $i++){
                                if($i == $defaultChildren){
	                                print "<option value='" . $i . "' selected>" . $i . "</option>\n";
                                }
                                else {
	                                print "<option value='" . $i . "'>" . $i . "</option>\n";
                                }
            				}
        				?>
        			</select>

        	</div>

    	</div>

    	<div class="wrap">
    		<div class="col">
    			<?php /*<input type="hidden" id="toursys-api-key" name="key" value="<?php print $GLOBALS['toursys-api-key']; ?>" />*/?>
                <input type="hidden" id="toursys-product-type" class="toursys-product-type" value="TRANSFER">
    			<input type="hidden" id="toursys-transfer-product-id" class="toursys-transfer-product-id" name="product-id" value="<?php print esc_attr($productId); ?>" />
				<input type="hidden" id="toursys-transfer-trip-type" class="toursys-transfer-trip-type" name="trip-type" value="<?php print esc_attr($tripType); ?>" />
				<input type="hidden" id="toursys-transfer-transfer-type" class="toursys-transfer-transfer-type" name="transfer-type" value="<?php print esc_attr($transferType); ?>" />
				<input type="hidden" id="toursys-transfer-max-adults" class="toursys-transfer-max-adults" name="max-adults" value="<?php print esc_attr($maxAdults); ?>" />
				<input type="hidden" id="toursys-transfer-max-children" class="toursys-transfer-max-children" name="max-children" value="<?php print esc_attr($maxChildren); ?>" />
                <input type="hidden" id="toursys-transfer-agency-login-popup" class="toursys-transfer-agency-login-popup" name="open-agency-login" value="<?php echo $openAgencyLogin; ?>" />
				<input type="hidden" id="toursys-key" class="toursys-key" name="key" value="<?php print get_option("toursys-api-token"); ?>">
			
    			<button type="button" id="toursys-submit" class="toursys-button toursys-submit toursys-booking-button" style="background-color:<?php print esc_attr($foreColor); ?>;  color: <?php print esc_attr($buttonTextColor); ?> !important;" id="toursys-booking-button"><?php print esc_attr($buttonText); ?></button>
    		</div>
    		<div class="text-right toursys-brand">
    			Powered by <a href="https://toursys.asia">TourSys</a>
    		</div>
    	</div>
	</div>
</form>
</div>
<style>

#toursys {
	font-family: '<?php print esc_attr($textFont); ?>' !important;
}
#toursys-form select{
    color: <?php print esc_attr($textColor); ?> !important;
    padding:10px !important;
    margin-bottom: 15px;
}
#toursys-form input{
    color: <?php print esc_attr($textColor); ?> !important;
    padding:10px !important;
    margin-bottom: 15px;
}
#toursys-form label{
    color: <?php print esc_attr($textColor); ?> !important;
    padding-left:0px;
    line-height: 2;
    font-size: inherit;
}
#toursys-form button:hover{
    background-color: <?php print esc_attr($backgroundColor); ?> !important;
}
#toursys-form .col {
	padding: 0;
    vertical-align:middle;
}
#toursys-form .toursys-button {
    margin-top: 5px;
/*    width: 100%;*/
}
#toursys-form .required-input{
    border:1px solid #ff0000 !important;
}
</style>