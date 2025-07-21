
<div id="toursys">
<?php

if(strpos(get_option("home"), DEV_WEBSITE) == true){
    $tsbeUrl = TOURSYS_BOOKING_ENGINE_URL_DEV;
}
else if(strpos(get_option("home"), LOCAL_WEBSITE) == true){
    $tsbeUrl = TOURSYS_BOOKING_ENGINE_URL_LOCAL;
}
else{
    $tsbeUrl = TOURSYS_BOOKING_ENGINE_URL;
}

$openAgencyLogin = ($openAgencyLogin == "true") ?  1 : 0;

$params = json_encode(array("productId" => $productId, "adults" => $defaultAdults, "children" => $defaultChildren, "tripDate" => $defaultDate,  "openAgencyLogin" => $openAgencyLogin));
?>
<a id="package-booking-button-<?php print uniqid(); ?> ?>" href="<?php echo esc_url($tsbeUrl . "packages/booking.php?key=" .   get_option("toursys-api-token") . "&q=" . toursysParamEncode($params)); ?>">
	<button type="button" id="toursys-booking-button" class="toursys-button" style="background-color:<?php echo esc_attr($foreColor); ?>; color: <?php echo esc_attr($buttonTextColor); ?> !important;" id="toursys-booking-button"><?php echo esc_attr($buttonText); ?></button>
</a>
</div>
<style>
#toursys {
	font-family: '<?php echo esc_attr($textFont); ?>' !important;
}
.toursys-button:hover{
    background-color: <?php echo esc_attr($backgroundColor); ?> !important;
}
</style>