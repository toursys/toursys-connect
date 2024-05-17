<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


$toursysApiParams = array("key" => get_option('toursys-api-key'), "system" => "TOURSYS");
$toursysApiUrl = (strpos(get_option("home"),  DEV_WEBSITE) !== false ? TOURSYS_API_URL_DEV : TOURSYS_API_URL);
$toursysApiUrl = (strpos(get_option("home"),  LOCAL_WEBSITE) !== false ? TOURSYS_API_URL_LOCAL : TOURSYS_API_URL);

//$response = callAPI("GET", $toursysApiUrl, $toursysApiParams);
$toursysResponse = array();
$toursysGetToken = "";



if(empty(get_option('toursys-api-key'))){

    $getTokenUrl = $toursysApiUrl . "auth/getToken?key=" . get_option('toursys-api-key') . "&system=TOURSYS";
    $toursysResponse = wp_remote_retrieve_body(wp_remote_get($getTokenUrl));
    // echo "<pre>";
    // die(print_r(array($toursysApiUrl, $toursysApiParams, $toursysResponse), true));
    $toursysGetToken = json_decode($toursysResponse);

}


if(!empty($toursysGetToken)){
    if($toursysGetToken->status == "AUTHORIZED"){

        update_option("toursys-api-token", trim($toursysGetToken->token));

    }
}

// dd($getToken);

//function callAPI($method, $url, $data = false){
//
//
//    $curl = curl_init();
//
//    switch ($method)
//    {
//        case "POST":
//            curl_setopt($curl, CURLOPT_POST, 1);
//
//            if ($data)
//                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//            break;
//        case "PUT":
//            curl_setopt($curl, CURLOPT_PUT, 1);
//            break;
//        default:
//            if ($data)
//                $url = sprintf("%s?%s", $url, http_build_query($data));
//    }
//
//
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//
//    $result = curl_exec($curl);
//
//    curl_close($curl);
//
//    var_dump($url);
//
//
//    return $result;
//
//}

function toursysParamEncode($data){

    return toursysRandomString() . base64_encode($data) . toursysRandomString();

}

function toursysParamDecode($data){

    $data = substr($data, 1);
    $data = substr($data, 0, -1);

    return base64_decode($data);
}

function toursysRandomString($length = 1) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Tour
function toursys_create_tour_booking_button($atts = array(), $content = null, $tag = ''){


    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }

    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'button-text' => "Book Now",
            'default-adults' => "",
            'default-children' => "",
            'default-date' => "",
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'open-agency-login' => "false"
        ),
        $atts
     );

    $productId = $attributes['product-id'];
    $buttonText = $attributes['button-text'];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];
    $defaultDate = $attributes['default-date'];

    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");

    $openAgencyLogin = $attributes['open-agency-login'];

    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($attributes['default-date'] == ""){
        $defaultDate = date("d/m/Y", strtotime("+7 day"));
    }

    if($attributes['secondary-color'] != ""){
        $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }

    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }



    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/tour_booking_button.php");
    $output = ob_get_clean();
    return $output;

}

function toursys_create_tour_booking_form($atts = array(), $content = null, $tag = ''){

    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }

    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'default-adults' => '',
            'default-children' => '',
            'default-date' => "",
            'max-adults' => '',
            'max-children' => '',
            'button-text' => "Book Now",
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'header-text' => "Book Tour Tour Today",
            'open-agency-login' => "false"
        ),
        $atts

    );

    $productId = $attributes['product-id'];
    $buttonText = $attributes['button-text'];
    $headerText = $attributes["header-text"];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];
    $defaultDate = $attributes['default-date'];
    $isDefaultDate = 0;
    if($defaultDate != ""){
        $isDefaultDate = 1;
    }

    $maxAdults = get_option("toursys-max-adults");
    $maxChildren = get_option("toursys-max-children");
    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");

    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($attributes['default-date'] == ""){
        $defaultDate = date("d/m/Y", strtotime("+7 day"));
    }

    if($attributes['max-adults'] != ''){
        $maxAdults = $attributes['max-adults'];
    }

    if($maxAdults == ''){
        $maxAdults = intval(get_option("toursys-max-adults")); 
    }

    if($maxAdults == ''){
        $maxAdults = 10;
    }

    if($attributes['max-children'] != ''){
        $maxChildren = $attributes['max-children'];
    }

    if($maxChildren == ''){
        $maxChildren = intval(get_option("toursys-max-children")); 
    }

    if($maxChildren == ''){
        $maxChildren = 5;
    }

    if($attributes['secondary-color'] != ""){
     $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }

    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }

    if($attributes['text-color'] != ""){
        $textColor = $attributes['text-color'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    if($attributes['header-text'] != ""){
        $headerText = $attributes['header-text'];
    }

    $openAgencyLogin = $attributes['open-agency-login'];

    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/tour_booking_form.php");
    $output = ob_get_clean();
    return $output;

}

// Transfer
function toursys_create_transfer_booking_button($atts = array(), $content = null, $tag = ''){

    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }

    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'trip-type' => "ONE-WAY",
            'transfer-type' => "PRIVATE",
            'button-text' => "Book Now",
            'default-adults' => '',
            'default-children' => '',
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'open-agency-login' => "false"
        ),
        $atts
    );

    $productId = $attributes['product-id'];
    $tripType = $attributes['trip-type'];
    $transferType = $attributes['transfer-type'];
    $buttonText = $attributes['button-text'];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];

    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");

    if($attributes['secondary-color'] != ""){
        $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }

    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }

    if($attributes['text-color'] != ""){
        $textColor = $attributes['text-color'];
    }

    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    $openAgencyLogin = $attributes['open-agency-login'];

    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/transfer_booking_button.php");
    $output = ob_get_clean();
    return $output;

}

function toursys_create_transfer_booking_form($atts = array(), $content = null, $tag = ''){

    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }


    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'trip-type' => "ONE-WAY",
            'transfer-type' => "PRIVATE",
            'default-adults' => '',
            'default-children' => '',
            'max-adults' => '',
            'max-children' => '',
            'button-text' => "Book Now",
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'header-text' => "Book Your Transfer Today",
            'open-agency-login' => "false"
        ),
        $atts

    );



    $productId = $attributes['product-id'];
    $tripType = $attributes['trip-type'];
    $transferType = $attributes['transfer-type'];
    $buttonText = $attributes['button-text'];
    $headerText = $attributes["header-text"];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];

    $maxAdults = get_option("toursys-max-adults");
    $maxChildren = get_option("toursys-max-children");
    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");


    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($maxAdults == ""){

        if($attributes['max-adults'] == ""){
            $maxAdults = 10;
        }
        else{
            $maxAdults = intval($attributes['max-adults']);
        }   
    }
    else{

        if($attributes['max-adults'] != ""){
            $maxAdults = intval($attributes['max-adults']);
        }

    }

    if($maxChildren == ""){

        if($attributes['max-children'] == ""){
            $maxChildren = 10;
        }
        else{
            $maxChildren = intval($attributes['max-children']);
        }   
    }
    else{

        if($attributes['max-children'] != ""){
            $maxChildren = intval($attributes['max-children']);
        }
        
    }

    if($attributes['max-children'] == ""){

        if($maxChildren == ""){

            if($attributes['max-children'] == ""){
                $maxChildren = 10;
            }
            else{
                $maxChildren = intval($attributes['max-children']);
            }
        }

    }
    else{
        $maxChildren = intval($attributes['max-children']);
    }

    if($attributes['secondary-color'] != ""){
     $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }

    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }

    if($attributes['text-color'] != ""){
        $textColor = $attributes['text-color'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    if($attributes['header-text'] != ""){
        $headerText = $attributes['header-text'];
    }

    $openAgencyLogin = $attributes['open-agency-login'];

    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/transfer_booking_form.php");
    $output = ob_get_clean();
    return $output;

}


// Package
function toursys_create_package_booking_button($atts = array(), $content = null, $tag = ''){

    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }

    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'single-supplement' => "false",
            'button-text' => "Book Now",
            'default-adults' => "",
            'default-children' => "",
            'default-date' => "",
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'open-agency-login' => "false"
        ),
        $atts
    );

    $productId = $attributes['product-id'];
    $singleSupplement = $attributes['single-supplement'];
    $buttonText = $attributes['button-text'];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];
    $defaultDate = $attributes['default-date'];


    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");

    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($attributes['default-date'] == ""){
        $defaultDate = date("d/m/Y", strtotime("+7 day"));
    }

    if($attributes['secondary-color'] != ""){
        $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }

    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    $openAgencyLogin = $attributes['open-agency-login'];

    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/package_booking_button.php");
    $output = ob_get_clean();
    return $output;

}

function toursys_create_package_booking_form($atts = array(), $content = null, $tag = ''){

    if(is_array($atts)) {
        foreach ($atts as $key => $value) {
            $atts[$key] = sanitize_text_field(strip_tags($value));
        }
    }

    $attributes = shortcode_atts(
        array(
            'id' => uniqid(),
            'product-id' => 0,
            'single-supplement' => "false",
            'default-adults' => '',
            'default-children' => '',
            'default-date' => "",
            'max-adults' => '',
            'max-children' => '',
            'button-text' => "Book Now",
            'primary-color' => "",
            'secondary-color' => "",
            'text-font' => "",
            'text-color' => "",
            'button-text-color' => "",
            'header-text' => "Book Your Package Today",
            'open-agency-login' => "false"
        ),
        $atts

    );

    $productId = $attributes['product-id'];
    $singleSupplement = $attributes['single-supplement'];
    $buttonText = $attributes['button-text'];
    $headerText = $attributes["header-text"];

    $defaultAdults  = $attributes['default-adults'];
    $defaultChildren  = $attributes['default-children'];
    $defaultDate = $attributes['default-date'];


    $maxAdults = get_option("toursys-max-adults");
    $maxChildren = get_option("toursys-max-children");
    $backgroundColor = get_option("toursys-secondary-color");
    $textFont = get_option("toursys-text-font");
    $foreColor = get_option("toursys-primary-color");
    $textColor = get_option("toursys-text-color");
    $buttonTextColor = get_option("toursys-button-text-color");


    if($attributes['default-adults'] == ""){
        $defaultAdults = 2;
    }

    if($attributes['default-children'] == ""){
        $defaultChildren = 0;
    }

    if($attributes['default-date'] == ""){
        $defaultDate = date("d/m/Y", strtotime("+7 day"));
    }

    if($attributes['max-adults'] != ''){
        $maxAdults = $attributes['max-adults'];
    }

    if($maxAdults == ''){
        $maxAdults = intval(get_option("toursys-max-adults"));
    }

    if($maxAdults == ''){
        $maxAdults = 10;
    }

    if($attributes['max-children'] != ''){
        $maxChildren = $attributes['max-children'];
    }

    if($maxChildren == ''){
        $maxChildren = intval(get_option("toursys-max-children"));
    }

    if($maxChildren == ''){
        $maxChildren = 5;
    }

    if($attributes['secondary-color'] != ""){
        $backgroundColor = $attributes['secondary-color'];
    }

    if($attributes['primary-color'] != ""){
        $foreColor = $attributes['primary-color'];
    }


    if($attributes['text-font'] != ""){
        $textFont = $attributes['text-font'];
    }


    if($attributes['text-color'] != ""){
        $textColor = $attributes['text-color'];
    }

    if($attributes['button-text-color'] != ""){
        $buttonTextColor = $attributes['button-text-color'];
    }

    if($attributes['header-text'] != ""){
        $headerText = $attributes['header-text'];
    }

    $openAgencyLogin = $attributes['open-agency-login'];

    ob_start();
    include(plugin_dir_path(dirname(__FILE__))  . "public/components/package_booking_form.php");
    $output = ob_get_clean();
    return $output;

}


add_shortcode("tour-booking-button", "toursys_create_tour_booking_button");
add_shortcode("tour-booking-form", "toursys_create_tour_booking_form");
add_shortcode("transfer-booking-button", "toursys_create_transfer_booking_button");
add_shortcode("transfer-booking-form", "toursys_create_transfer_booking_form");
add_shortcode("package-booking-button", "toursys_create_package_booking_button");
add_shortcode("package-booking-form", "toursys_create_package_booking_form");

?>
