<?php
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        die;
    }

    delete_option("toursys-api-key");
    delete_option("toursys-api-token");
    delete_option("toursys-account-name");
    delete_option("toursys-account-type");
//    delete_option("toursys-max-adults");
//    delete_option("toursys-max-children");
//    delete_option("toursys-secondary-color");
//    delete_option("toursys-text-font");
//    delete_option("toursys-primary-color");
//    delete_option("toursys-text-color");
//    delete_option("toursys-button-text-color");
  

?>