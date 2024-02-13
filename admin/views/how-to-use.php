<script>
jQuery(document).ready(function($) {
    $('#tabs').tabs();
})    
</script>
  <br><br>

<div class="roww toursys-admin-how-to">
    <div class="col-md-12" style="margin:0px;">
        <div id="toursys" class="container">

            <div id="tabs" style="display:block; width:100% !important;">
                <div class="panel-heading">HOW TO USE TOURSYS CONNECT</div>
                <div>
                        <img class="panel-logo" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/toursys-logo.png'; ?>"/>
                </div>
                <ul style="padding-left:12px; padding-right:12px;">
                    <li><a href="#tabs-tour">For your Tour Products</a></li>
                    <li><a href="#tabs-transfer">For your Transfer Products</a></li>
                    <li><a href="#tabs-package">For your Package Products</a></li>
                </ul>

               

    
                <div id="tabs-tour" class="panel-success">
       
                    <div class="panel-body">
                        <p class="font-heavy text-orange">Booking Button [tour-booking-button]</p>
                        <p>The Tour Booking Button shortcode displays a button on your webpage with a link to the TourSys Connect Booking page.</p>

                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>
                        <code style="display: block; white-space:pre-line; line-height: normal; width:260px; !important; padding-left:20px; padding-bottom:20px;">
                        [tour-booking-button
                            product-id="486"
                            button-text="Book Now"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            default-adults="2"
                            default-children="0"
                            default-date="DD/MM/YYYY"
                            open-agency-login="true"
                        ]
                        </code>
                        <br>
                        <br>
                        <p class="font-heavy mb10">Available parameters</p>
                        <p class="parameter">product-id <span class="required">Required</span></p>
                        <p>ID of the tour product to be booked in TourSys</p>
                        <p class="parameter">button-text <span class="required">Required</span></p>
                        <p>Text displayed on booking button.</p>
                        <p class="parameter">primary-color</p>
                        <p>Background color of button.</p>
                        <p class="parameter">secondary-color</p>
                        <p>Background color button when hovering.</p>
                        <p class="parameter">default-adults</p>
                        <p>Pre-selected number of adults upon landing on booking page.</p>
                        <p class="parameter">default-children</p>
                        <p>Pre-selected number of children upon landing on booking page.</p>
                        <p class="parameter">default-date</p>
                        <p>Fix the date sent to the booking page so the tour can only be booked for that exact date. Useful for collective tours which begin on a specific date. Note that the date format must be Day, Month, Year:  DD/MM/YYYY (eg:  25/12/2022).</p>
                        <p class="parameter">open-agency-login</p>
                        <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>



                        <hr class="hr">


                        <p class="font-heavy text-orange">Booking Form [tour-booking-form]</p>
                        <p>The Tour Booking Form shortcode displays a form on your webpage with a link to the TourSys Connect Booking page.</p>
                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>
                        <code style="display: block; white-space:pre-line; line-height: normal; width:260px; !important; padding-left:20px; padding-bottom:20px;">
                        [tour-booking-form
                            product-id="486"
                            button-text="Book Now"
                            default-adults="2"
                            default-children="0"
                            default-date="DD/MM/YYYY"
                            max-adults="6"
                            max-children="4"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            header-text="Make Booking Now"
                            text-color="#000000"
                            button-text-color="#ffffff"
                            open-agency-login="true"
                        ]
                        </code>
                        <br>
                        <br>
                        <table style="display:block; width:100%">
                            <tr>
                                <td width="60%" style="vertical-align: top;">
                                <p class="font-heavy mb10">Available parameters</p>
                                <p class="parameter">product-id <span class="required">Required</span></p>
                                <p>ID of the tour product to be booked in TourSys</p>
                                <p class="parameter">button-text <span class="required">Required</span></p>
                                <p>Text displayed on booking button.</p>
                                <p class="parameter">default-adults</p>
                                <p>Pre-selected number of adults upon landing on booking page.</p>
                                <p class="parameter">default-children</p>
                                <p>Pre-selected number of children upon landing on booking page.</p>
                                <p class="parameter">default-date</p>
                                <p>Fix the date sent to the booking page so the tour can only be booked for that exact date. Useful for collective tours which begin on a specific date. Note that the date format must be Day, Month, Year:  DD/MM/YYYY (eg:  25/12/2022).</p>
                                <p class="parameter">max-adults</p>
                                <p>Max number of adults user can input</p>
                                <p class="parameter">max-children</p>
                                <p>Max number of children user can input.</p>
                                <p class="parameter">header-text</p>
                                <p>Text displayed at the top of the form.</p>
                                <p class="parameter">primary-color</p>
                                <p>Background color of button.</p>
                                <p class="parameter">secondary-color</p>
                                <p>Background color of button when hovering.</p>
                                <p class="parameter">text-color</p>
                                <p>Color of text on form label.</p>
                                <p class="parameter">button-text-color</p>
                                <p>Color of text on button.</p>
                                <p class="parameter">open-agency-login</p>
                                <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>

                                </td>
                                <td width="40%">
                                    
                                    <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-setting.png'; ?>"/>
                                    <br>
                                    <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-form-tour.png'; ?>"/>

                                </td>
                            </tr>
                        </table>

                    </div>
                </div>



                <div id="tabs-transfer" class="panel-success">


                    <div class="panel-body">
                        <p class="font-heavy text-orange">Booking Button [transfer-booking-button]</p>
                        <p>The Transfer Booking Button shortcode displays a button on your webpage with a link to the TourSys Connect Booking page.</p>

                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>

                        <code style="display: block; white-space:pre-line; line-height: normal; width:260px; !important; padding-left:20px; padding-bottom:20px;">
                        [transfer-booking-button
                            product-id="163"
                            transfer-type="SHARED"
                            button-text="Book Transfer"
                            trip-type="ONE-WAY"
                            default-adults="2"
                            default-children="0"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            open-agency-login="true"
                        ]
                        </code>

                        <br>
                        <br>
                        <p class="font-heavy mb10">Available parameters</p>
                        <p class="parameter">product-id <span class="required">Required</span></p>
                        <p>ID of the transfer product to be booked in TourSys.</p>
                        <p class="parameter">transfer-type <span class="required">Required</span></p>
                        <p>The transfer type set for this product in TourSys. Accepts the values: PRIVATE, SHARED or COST-PLUS. If you do not add this parameter, the system uses PRIVATE as the default.</p>
                        <p class="parameter">trip-type <span class="required">Required</span></p>
                        <p>The type of trip you set for users to book. Accepts the values: ONE-WAY or ROUND-TRIP. If you do not add this parameter, the system uses ONE-WAY as the default.</p>
                        <p class="parameter">button-text <span class="required">Required</span></p>
                        <p>Text displayed on booking button.</p>
                        <p class="parameter">default-adults</p>
                        <p>Pre-selected number of adults upon landing on booking page.</p>
                        <p class="parameter">default-children</p>
                        <p>Pre-selected number of children upon landing on booking page.</p>
                        <p class="parameter">primary-color</p>
                        <p>Background color of button.</p>
                        <p class="parameter">secondary-color</p>
                        <p>Background color button when hovering.</p>
                        <p class="parameter">default-date</p>
                        <p>the default-date parameter is NOT supported in the short code for transfer-booking-button or transfer-booking-form.</p>
                        <p class="parameter">open-agency-login</p>
                        <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>


                        <hr class="hr">


                        <p class="font-heavy text-orange">Booking Form [transfer-booking-form]</p>
                        <p>The Transfer Booking Form shortcode displays a form on your webpage with a link to the TourSys Connect Booking page.</p>
                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>
                        <code style="display: block; white-space:pre-line; line-height: normal; width:340px; !important; padding-left:20px; padding-bottom:20px;">
                        [transfer-booking-form
                            product-id="163"
                            transfer-type="SHARED"
                            trip-type="ONE-WAY"
                            button-text="Book Now"
                            header-text="Book This Transfer Today"
                            default-adults="2"
                            default-children="0"
                            max-adults="4"
                            max-children="2"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            text-color="#000000"
                            button-text-color="#ffffff"
                            open-agency-login="true"
                        ]
                        </code>
                        <br>
                        <br>
                        <table style="display:block; width:100%;">
                            <tr>
                                <td width="60%" style="vertical-align: top;">
                                <p class="font-heavy mb10">Available parameters</p>
                                <p class="parameter">product-id <span class="required">Required</span></p>
                                <p>ID of the transfer product to be booked in TourSys</p>
                                <p class="parameter">transfer-type <span class="required">Required</span></p>
                                <p>The transfer type set for this product in TourSys. Accepts the values: PRIVATE, SHARED or COST-PLUS. If you do not add this parameter, the system uses PRIVATE as the default.</p>
                                <p class="parameter">trip-type <span class="required">Required</span></p>
                                <p>The type of trip you set for users to book. Accepts the values: ONE-WAY or ROUND-TRIP. If you do not add this parameter, the system uses ONE-WAY as the default. If ROUND-TRIP is set, both arrival date and departure date appear on the booking form.</p>
                                <p class="parameter">button-text <span class="required">Required</span></p>
                                <p>Text displayed on booking button.</p>
                                <p class="parameter">header-text</p>
                                <p>Text displayed at the top of the form.</p>
                                <p class="parameter">default-adults</p>
                                <p>Pre-selected number of adults upon landing on booking page.</p>
                                <p class="parameter">default-children</p>
                                <p>Pre-selected number of children upon landing on booking page.</p>
                                <p class="parameter">max-adults</p>
                                <p>Max number of adults user can input</p>
                                <p class="parameter">max-children</p>
                                <p>Max number of children user can input.</p>
                                <p class="parameter">primary-color</p>
                                <p>Background color of button.</p>
                                <p class="parameter">secondary-color</p>
                                <p>Background color button when hovering.</p>
                                <p class="parameter">text-color</p>
                                <p>Color of text on form label.</p>
                                <p class="parameter">button-text-color</p>
                                <p>Color of text on button.</p>
                                <p class="parameter">default-date</p>
                                <p>the default-date parameter is NOT supported in the short code for transfer-booking-button or transfer-booking-form.</p>
                                <p class="parameter">open-agency-login</p>
                                <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>

                                </td>
                                <td width="40%">
                                    <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-setting.png'; ?>"/>
                                    <br>
                                        <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-form-transfer.png'; ?>"/>

                                </td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div id="tabs-package" class="panel-success">

                    <div class="panel-body">
                        <p class="font-heavy text-orange">Booking Button [package-booking-button]</p>
                        <p>The Package Booking Button shortcode displays a button on your webpage with a link to the TourSys Connect Booking page.</p>

                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>
                        <code style="display: block; white-space:pre-line; line-height: normal; width:260px; !important; padding-left:20px; padding-bottom:20px;">
                            [package-booking-button
                            product-id="486"
                            button-text="Book Now"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            default-adults="2"
                            default-children="0"
                            default-date="DD/MM/YYYY"
                            open-agency-login="true"
                            ]
                        </code>
                        <br>
                        <br>
                        <p class="font-heavy mb10">Available parameters</p>
                        <p class="parameter">product-id <span class="required">Required</span></p>
                        <p>ID of the package product to be booked in TourSys</p>
                        <p class="parameter">button-text <span class="required">Required</span></p>
                        <p>Text displayed on booking button.</p>
                        <p class="parameter">primary-color</p>
                        <p>Background color of button.</p>
                        <p class="parameter">secondary-color</p>
                        <p>Background color button when hovering.</p>
                        <p class="parameter">default-adults</p>
                        <p>Pre-selected number of adults upon landing on booking page.</p>
                        <p class="parameter">default-children</p>
                        <p>Pre-selected number of children upon landing on booking page.</p>
                        <p class="parameter">default-date</p>
                        <p>Fix the date sent to the booking page so the package can only be booked for that exact date. Useful for collective packages which begin on a specific date. Note that the date format must be Day, Month, Year:  DD/MM/YYYY (eg:  25/12/2022).</p>
                        <p class="parameter">open-agency-login</p>
                        <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>


                        <hr class="hr">


                        <p class="font-heavy text-orange">Booking Form [package-booking-form]</p>
                        <p>The Package Booking Form shortcode displays a form on your webpage with a link to the TourSys Connect Booking page.</p>
                        <br>
                        <p class="font-heavy mb10">Sample Shortcode</p>
                        <code style="display: block; white-space:pre-line; line-height: normal; width:260px; !important; padding-left:20px; padding-bottom:20px;">
                            [package-booking-form
                            product-id="486"
                            button-text="Book Now"
                            default-adults="2"
                            default-children="0"
                            default-date="DD/MM/YYYY"
                            max-adults="6"
                            max-children="4"
                            primary-color="#6699CC"
                            secondary-color="#6699FF"
                            header-text="Make Booking Now"
                            text-color="#000000"
                            button-text-color="#ffffff"
                            open-agency-login="true"
                            ]
                        </code>
                        <br>
                        <br>
                        <table style="display:block; width:100%">
                            <tr>
                                <td width="60%" style="vertical-align: top;">
                                    <p class="font-heavy mb10">Available parameters</p>
                                    <p class="parameter">product-id <span class="required">Required</span></p>
                                    <p>ID of the package product to be booked in TourSys</p>
                                    <p class="parameter">button-text <span class="required">Required</span></p>
                                    <p>Text displayed on booking button.</p>
                                    <p class="parameter">default-adults</p>
                                    <p>Pre-selected number of adults upon landing on booking page.</p>
                                    <p class="parameter">default-children</p>
                                    <p>Pre-selected number of children upon landing on booking page.</p>
                                    <p class="parameter">default-date</p>
                                    <p>Fix the date sent to the booking page so the package can only be booked for that exact date. Useful for collective packages which begin on a specific date. Note that the date format must be Day, Month, Year:  DD/MM/YYYY (eg:  25/12/2022).</p>
                                    <p class="parameter">max-adults</p>
                                    <p>Max number of adults user can input</p>
                                    <p class="parameter">max-children</p>
                                    <p>Max number of children user can input.</p>
                                    <p class="parameter">header-text</p>
                                    <p>Text displayed at the top of the form.</p>
                                    <p class="parameter">primary-color</p>
                                    <p>Background color of button.</p>
                                    <p class="parameter">secondary-color</p>
                                    <p>Background color of button when hovering.</p>
                                    <p class="parameter">text-color</p>
                                    <p>Color of text on form label.</p>
                                    <p class="parameter">button-text-color</p>
                                    <p>Color of text on button.</p>
                                    <p class="parameter">open-agency-login</p>
                                    <p>When true, the agency login popup will automatically appear every time a user clicks to open the TourSys Booking page. When not included in the shortcode, the parameter defaults to false.</p>


                                </td>
                                <td width="40%">

                                    <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-setting.png'; ?>"/>
                                    <br>
                                    <img style="width:400px;" src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/example-form-tour.png'; ?>"/>

                                </td>
                            </tr>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
