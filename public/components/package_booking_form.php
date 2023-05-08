<?php


$tsbeUrl = (strpos(get_option("home"), DEV_WEBSITE) !== false ? TOURSYS_BOOKING_ENGINE_URL_DEV : TOURSYS_BOOKING_ENGINE_URL);
?>
<div id="toursys" class="toursys-connect">

<form id="toursys-form" class="toursys-form" action="<?php echo esc_url($tsbeUrl . "packages/booking.php"); ?>"  method="get" style="display:block; position:relative; width:100%;  max-width:500px !important; border:0px; background-color:none; padding:0px; margin-bottom:20px;">

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
			<h4 style="color: <?php print esc_attr($textColor); ?> !important;"><?php echo esc_attr($headerText); ?></h4>
		</div>
    	<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">Trip Date: </label>
                <?php if($isDefaultDate == 1){ ?>
                    <input type="text" class="toursys-package-trip-date" value="<?php echo esc_attr($defaultDate);?>" name="trip-date" id="toursys-package-trip-date" placeholder="Trip Date" readonly="true" required="required" disabled="disabled"  />
                <?php }else { ?>
    			    <input type="text" class="toursys-datepicker toursys-package-trip-date" value="<?php echo esc_attr($defaultDate);?>"  name="trip-date" id="toursys-package-trip-date" placeholder="Trip Date" readonly="true" required="required" />
    		    <?php } ?>
            </div>
    	</div>
    	<div class="wrap">
    		<div class="col">
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">No. of Adults: </label>

        			<select name="adults" id="toursys-package-adults" class="toursys-package-adults">
        				<?php
            				for($i = 1; $i <= $maxAdults; $i++){
                                if($i == $defaultAdults){
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
    			<label style="color: <?php print esc_attr($textColor); ?> !important;">No. of Children: </label>

        			<select name="children" id="toursys-package-children" class="toursys-package-children">
        				<?php
            				for($i = 0; $i <= $maxChildren; $i++){
				                if($i == $defaultChildren) {
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
    			<?php /*<input type="hidden" id="toursys-api-key" name="key" value="<?php print $GLOBALS['toursys-api-key']; ?>" />*/?>
                <input type="hidden" id="toursys-product-type" class="toursys-product-type" value="PACKAGE">
    			<input type="hidden" id="toursys-package-product-id" class="toursys-package-product-id" name="product-id" value="<?php echo esc_attr($productId); ?>" />
				<input type="hidden" id="toursys-package-max-adults" class="toursys-package-max-adults" name="max-adults" value="<?php echo esc_attr($maxAdults); ?>" />
				<input type="hidden" id="toursys-package-max-children" class="toursys-package-max-children" name="max-children" value="<?php echo esc_attr($maxChildren); ?>" />
                <input type="hidden" id="toursys-key" class="toursys-key" name="key" value="<?php print get_option("toursys-api-token");?>">
    			<button type="button" id="toursys-submit" class="toursys-button toursys-submit toursys-booking-button" style="background-color:<?php echo esc_attr($foreColor); ?>;  color: <?php echo esc_attr($buttonTextColor); ?> !important;" id="toursys-booking-button"><?php echo esc_attr($buttonText); ?></button>
    		</div>
    		<div class="text-right toursys-brand">
    			Powered by <a href="https://toursys.asia">TourSys</a>
    		</div>
    	</div>
	</div>
</form>
</div>
<style>

#toursys  {
	font-family: '<?php echo esc_attr($textFont); ?>' !important;
}
#toursys-form select{
    color: <?php echo esc_attr($textColor); ?> !important;
    padding:10px !important;
    margin-bottom: 15px;
}
#toursys-form input{
    color: <?php echo esc_attr($textColor); ?> !important;
    padding:10px !important;
    margin-bottom: 15px;
}
#toursys-form label{
    color: <?php echo esc_attr($textColor); ?> !important;
    padding-left:0px;
    line-height: 2;
    font-size: inherit;
}
#toursys-form button:hover{
    background-color: <?php echo esc_attr($backgroundColor); ?> !important;
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
<script>
$(document).ready(function(){

});
</script>
