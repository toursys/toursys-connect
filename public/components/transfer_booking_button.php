<div id="toursys">
<?php
$tsbeUrl = (strpos(get_option("home"), DEV_WEBSITE) !== false ? TOURSYS_BOOKING_ENGINE_URL_DEV : TOURSYS_BOOKING_ENGINE_URL);
$params = json_encode(array("productId" => $productId, "adults" => $defaultAdults, "children" => $defaultChildren, "tripType" => $tripType, "transferType" => $transferType));

?>
<a id="transfer-booking-button-<?php print uniqid(); ?>" href="<?php print esc_url($tsbeUrl . "transfers/booking.php?key=" .   get_option("toursys-api-token") . "&q=" . paramEncode($params)); ?>">
	<button type="button" id="toursys-booking-button" class="toursys-button" style="background-color:<?php print esc_attr($foreColor); ?>; color: <?php print esc_attr($buttonTextColor); ?> !important;" id="toursys-booking-button"><?php print esc_attr($buttonText); ?></button>
</a>
</div>
<style>

#toursys {
	font-family: '<?php print esc_attr($textFont); ?>' !important;
}
.toursys-button:hover{
    background-color: <?php print esc_attr($backgroundColor); ?> !important;
}
</style>
